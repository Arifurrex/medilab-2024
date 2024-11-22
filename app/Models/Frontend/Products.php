<?php

namespace App\Models\Frontend;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // Define the inverse relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
