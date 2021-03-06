<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    
    public function run()
    {

        $users = [
            [
                'name' => 'Andre Aparecido de Melo',
                'email' => 'k_andre_16@hotmail.com',
                'cpf' => '06934092902',
                'profile_id' => 1,
                'password' => bcrypt('06934092902'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Jeniffer Cristine Koppen de Melo',
                'email' => 'jeniffer_koppen@hotmail.com',
                'cpf' => '33634637072',
                'profile_id' => 2,
                'password' => bcrypt('33634637072'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],   
            [
                'name' => 'Joao de Melo',
                'email' => 'joao_koppen@hotmail.com',
                'cpf' => '06944854031',
                'profile_id' => 2,
                'password' => bcrypt('06944854031'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],   
            [
                'name' => 'Maria de Melo',
                'email' => 'maria_koppen@hotmail.com',
                'cpf' => '20817965033',
                'profile_id' => 1,
                'password' => bcrypt('20817965033'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],   
        ];

        User::insert($users);
    }
}
