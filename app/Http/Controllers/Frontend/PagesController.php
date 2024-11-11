<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Frontend\Products;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Category;

class PagesController extends Controller
{
    public function index()
    {
        $data['products'] = Products::orderBy('id', 'desc')->get();
        $data['categories'] = Category::with('subcategories')->whereNull('parent_id')->get();
        $data['featuredProducts_categories'] = Category::whereIn('id', [72, 73, 74,78])->get();
        return view('frontend.index', $data);
    }
}
