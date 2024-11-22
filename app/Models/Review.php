<?php

namespace App\Models;

use App\Models\Frontend\Products;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['product_id','user_id','review','rating'];

    public function product(){
        return $this->belongsTo(Products::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
