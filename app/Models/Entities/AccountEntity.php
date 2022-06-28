<?php

namespace App\Models\Entities;


use Illuminate\Database\Eloquent\Model;

Class AccountEntity extends Model 
{
    
    protected $table = 'accounts';
    
    protected $fillable = [
        'user_id','value'
    ];
    
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
	