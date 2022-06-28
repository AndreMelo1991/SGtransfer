<?php
namespace App\Models\Repositories;
use App\Helper;
use App\Interfaces\IRepository;
use App\Models\User;
use Carbon\Carbon;

Class UserRepository extends User
{
    public function getUser($id){
       
        return self::with('perfil')
                    ->where('id',"=",$id)
                    ->first();

    }



}
