<?php
namespace App\Services;
use \App\Models\Repositories\TransactionRepository;
use \App\Models\Repositories\UserRepository;
use \App\Models\Repositories\AccountRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Models\Utils\Utils;

class TransactionService {


    public function transaction($request){
        
        /* Validates if the fields are inside the request*/
        $data = $request->only('user_id', 'user_id_send','value');
        $objData = (object) $data;
        $validator = Validator::make($data, [
            'value' => 'required',
            'user_id' => 'required',
            'user_id_send' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }   

        /*
            validates if the user exists

        */
        $user = (new UserRepository)->getUser($objData->user_id);
        if(is_null($user)){
            return response()->json([
                'success' => false,
                'message' => 'User '.$objData->user_id.' does not exist!',
            ], 400);
        }
        $userSend = (new UserRepository)->getUser($objData->user_id_send);
        if(is_null($userSend)){
            return response()->json([
                'success' => false,
                'message' => 'User '.$objData->user_id_send.' does not exist!',
            ], 400);
        }
        
        /* 
            User who is debiting your account
            Valid is user perfil is active send money
        */
        if(!$user->perfil->is_send_money){
            return response()->json([
                'success' => false,
                'message' => 'Sorry user '.$user->name.' cannot send money!',
            ], 400);
        }
        
        $account = (new AccountRepository())->getAccountByID($objData->user_id);
        if(!$this->validateFoundsTransaction($account,$objData)){
            return response()->json([
                'success' => false,
                'message' => 'Sorry you insufficient funds!',
            ], 400);
        }
        $url = "";
        
        /* Valid is mock is online with return */
        $validateMockAutorizator = (object) $this->validateMockAutorizator();
        if(!$validateMockAutorizator->status){
            return response()->json([
                'success' => false,
                'message' => $validateMockAutorizator->message,
            ], 400);
        }
        
        /* Get value final account the outside user*/
        $valueUserOut = $this->calcValue($account->value,$objData->value,config('constants.subtract'));

        /* Get value final account the inside user*/
        $accountIn = (new AccountRepository())->getAccountByID($objData->user_id_send);
        $valueUserIn = $this->calcValue($accountIn->value,$objData->value,config('constants.add'));
        
        /* Send Transfer Values with users*/
        if((new AccountRepository())->transfer($valueUserOut,$valueUserIn,$objData)){
            $transactionValue = number_format((float) $objData->value, 2, '.', '');
            $transactionLog = (new TransactionRepository())->transactionLog($valueUserOut,$valueUserIn,$objData,$transactionValue);
            $sendNotificacao = (object) $this->sendNotification($accountIn,$objData);
            if(isset($sendNotificacao->status)){
                return response()->json([
                    'success' => $sendNotificacao->status,
                    'message' => "Operation performed successfully",
                ], 200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => "Operation performed, but user not notified",
                ], 200);   
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => "Sorry transaction not carried out!'",
            ], 400);
        }

        
    }

    public function validateFoundsTransaction($account,$objData){
        /* Valid Balance*/        
        return (new Utils())->valideBalance($account,$objData);
    }


    public function validateMockAutorizator(){
        return (new Utils())->getAutorizator();
    }
    
    public function calcValue($accountValue,$value,$type){
        return (new Utils())->calcValue($accountValue,$value,$type);
    }
    
    public function sendNotification($accountIn,$objData){
        return (new Utils())->sendNotification($accountIn,$objData);
    }



}