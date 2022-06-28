<?php
namespace App\Models\Utils;

class Utils 
{
    /*
        Valid Balance
        return true or false case user you have founds 
    */        
       
    public function valideBalance($account,$objData){
        
        
        $value = number_format((float) $objData->value, 2, '.', ''); 
        $valueAccount = number_format((float) $account->value, 2, '.', ''); 

        if(($valueAccount - $value ) >= 0){
            return true;
        }

        return false;
    }

    public function calcValue($accountValue,$value,$type){
        
        $total = 0;
        $accountValue = number_format((float) $accountValue, 2, '.', ''); 
        $transactionValue = number_format((float) $value, 2, '.', ''); 

        switch ($type) {
            case "-":
                $total = ($accountValue - $transactionValue);
                break;
            case "+":
                $total = ($accountValue + $transactionValue);
                break;
        }

        return $total;
    }

    public function getAutorizator(){
        $url = config('constants.url_autorizator');
        $method = "GET";
        $data = null;

        // mock with error created test
        //$url = "https://run.mocky.io/v3/0e409885-58c0-4429-a0e1-edd08ad27b1a";
        $resultado = $this->curl($url,$data,$method);
        
        return $resultado;    
    }
    
    public function sendNotification($accountIn,$objData){
        $url = config('constants.url_notification');
        $method = "POST";

        $data = array(  
                    "to" => $accountIn->user->email,
                    "subeject" => "sistema@sgtransfer.com.br",
                    "message" => $accountIn->user->name.", you received a transaction"
        );
        
        $resultado = $this->curl($url,$data,$method);
        return $resultado;    
    }

    public function curl($url,$data,$method){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);


        if($method == "POST"){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $result = curl_exec($ch);
         if(!curl_errno($ch)){
            $result = array(
                        "status" => true,
                        "message" => "success",
                        "date" => json_decode(curl_exec($ch))
            );
        }else{
            $result = array(
                "status" => false,
                "message" => curl_error($ch),
                "date" => null);
        } 
        
        return $result;
    }

}