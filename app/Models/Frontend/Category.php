<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{

    // প্যারেন্ট ক্যাটাগরি রিলেশন
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    // সাব-ক্যাটাগরি রিলেশন
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('subcategories');
    }
}
