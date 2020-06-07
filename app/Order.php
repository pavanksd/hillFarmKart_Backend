<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'user_contact', 'user_name','user_address','order_details'
    ];
}
