<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Products;

class Cart extends Model
{
    //
    public $table = 'cart';
    protected $fillable = ['products_id', 'user_id', 'session_id', 'quantity'];
    protected function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    protected function products(){
        return $this->belongsTo(Products::class, 'products_id');
    }
}
