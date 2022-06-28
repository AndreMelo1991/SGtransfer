<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entities\ProfileEntity as Profile;

class ProfileSeeder extends Seeder
{

    public function run()
    {

        $profiles = [
            [
                'id' => 1,
                'name' => 'Comum',
                'is_send_money' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'name' => 'Lojista',
                'is_send_money' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];
        
        Profile::insert($profiles);
    }
}
