<?php

namespace App\Models\Repositories;


use Illuminate\Database\Eloquent\Model;

Class ProfileEntity extends Model 
{
    
    protected $table = 'profiles';
    
    protected $fillable = [
        'name'
    ];
    
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    
}
	