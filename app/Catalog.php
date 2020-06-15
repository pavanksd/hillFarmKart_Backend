<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
        'item_name', 'user_contact', 'price','is_enabled'
    ];
    
    protected $attributes = [
        'is_enabled' => 1,
     ];
 
}
