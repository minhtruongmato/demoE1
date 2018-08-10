<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bill()
    {
    	return $this->hasMany('App\Bill', 'customer_id', 'id');
    }
}
