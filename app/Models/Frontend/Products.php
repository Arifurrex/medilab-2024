<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
