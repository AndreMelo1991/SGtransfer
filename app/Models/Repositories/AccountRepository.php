<?php
namespace App\Models\Repositories;
use App\Helper;
use App\Interfaces\IRepository;
use App\Models\Entities\AccountEntity;
use Carbon\Carbon;
use DB;

Class AccountRepository extends AccountEntity
{
    public function getAccountByID($user_id){
        return self::with('user')
                    ->where("id", "=", $user_id)->first();
    }

    public function transfer($valueUserOut,$valueUserIn,$objData){
        
        /* Return true default of course transaction not error */
        $return = true;
        
        \DB::beginTransaction();
        try {
            $userAccountOut = AccountEntity::where("id","=",$objData->user_id)
                         ->update([
                            'value' => $valueUserOut,
                         ]);

            $userAccountOut = AccountEntity::where("id","=",$objData->user_id_send)
                         ->update([
                            'value' => $valueUserIn,
                         ]);             

            \DB::commit();
        } catch (\Exception $e) {
           \DB::rollBack();
           $return = false;
        }
        
        return $return;
    }



}
