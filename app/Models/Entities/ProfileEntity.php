<?php

namespace App\Models\Entities;


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
	