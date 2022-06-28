<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entities\AccountEntity as Account;

class AccountSeeder extends Seeder
{
    public function run()
    {

        $accounts = [
            [
                'user_id' => 1,
                'value' => 1000,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 2,
                'value' => 200,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                
            ],   
            [
                'user_id' => 3,
                'value' => 100,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                
            ],   
            [
                'user_id' => 4,
                'value' => 500,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                
            ],   
        ];

        Account::insert($accounts);
    }
}
