<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\MenuItem;
use App\Http\Controllers\Controller;

class MenuItemController extends Controller
{
    // change this file according to ur choice -arifur
    public function index()
    {
        $menuItems = MenuItem::whereNull('parent_id')->with('children')->get();
        return view('admin.menu.index', compact('menuItems'));
    }

    public function create()
    {
        $parentItems = MenuItem::whereNull('parent_id')->get();
        return view('admin.menu.create', compact('parentItems'));
    }

    public function store(Request $request)
    {
        MenuItem::create($request->all());
        return redirect()->route('admin.menu.index');
    }

    // Edit, update, delete functions go here
}
