<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    //
    public $table = 'brands';

    protected function products(){
        return $this->hasMany(Products::class);
    }
}
