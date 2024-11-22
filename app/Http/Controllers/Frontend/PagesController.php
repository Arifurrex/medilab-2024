<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Frontend\Products;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Category;

class PagesController extends Controller
{
    public function home()
    {
        $data['products'] = Products::orderBy('id', 'desc')->get();
        $data['categories'] = Category::with('subcategories')->whereNull('parent_id')->get();
        $data['featuredProducts_categories'] = Category::whereIn('id', [72, 73, 74, 78])->get();
        $data['latest_products'] = Products::orderBy('created_at', 'desc')->get();

        // প্রতি ৩টি প্রোডাক্টের একটি গ্রুপ তৈরি এবং ভিউতে পাঠানো
        $data['productChunks'] = $data['latest_products']->chunk(3);

        $data['topRatedProducts'] = Products::orderBy('rating', 'desc')->take(10)->get();
        $data['TopRatedProductChunks'] = $data['topRatedProducts']->chunk(3);
        return view('frontend.index', $data);
    }

    public function shop()
    {
        $data['categories'] = Category::with('subcategories')->whereNull('parent_id')->get();
        $data['featuredProducts_categories'] = Category::whereIn('id', [72, 73, 74, 78])->get();
        return view('frontend.shop-grid', $data);
    }

    public function shop_details($slug)
    {
        $data['product'] = Products::where('slug', $slug)->first();
        $data['categories'] = Category::with('subcategories')->whereNull('parent_id')->get();
        return view('frontend.shop-details', $data);
    }

    public function categoryIndex($slug)
    {
        $data['category'] = Category::with(['subcategories.products', 'products'])->where('slug', $slug)->first();

        $data['allProducts'] = collect($data['category']->products)
            ->merge($data['category']->subcategories->flatMap(fn($subcategory) => $subcategory->products));
        $data['categories'] = Category::with('subcategories')->whereNull('parent_id')->get();
        return view('frontend.categories.index', $data);
    }
}
