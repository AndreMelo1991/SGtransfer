<?php
namespace App\Models\Repositories;
use App\Helper;
use App\Interfaces\IRepository;
use DB;
use DateTime;
use App\Models\User;
use App\Models\Entities\TransactionEntity;
use App\Http\Controllers\Utils;

use Carbon\Carbon;

Class TransactionRepository extends TransactionEntity
{

    public function transactionLog($valueUserOut,$valueUserIn,$objData,$transactionValue){
        $transaction = new TransactionEntity();
        $transaction->user_id = $objData->user_id;
        $transaction->user_id_send = $objData->user_id_send;
        $transaction->amount = $transactionValue;
        $transaction->save();
    }


}
