<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Products extends Model
{
    //
    public $table = 'products';

    protected function brands(){
        return $this->belongsTo(Brands::class);
    }

    protected function carts(){
        return $this->hasMany(Cart::class);
    }
}
