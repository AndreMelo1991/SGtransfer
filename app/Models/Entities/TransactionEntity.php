<?php

namespace App\Models\Entities;


use Illuminate\Database\Eloquent\Model;

Class TransactionEntity extends Model 
{
    
    protected $table = 'transactions';
    
    protected $fillable = [
        'user_id','user_id_send','amount'
    ];
    
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    
}
	