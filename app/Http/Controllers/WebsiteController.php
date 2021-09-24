<?php

namespace App\Http\Controllers;

use App\Page;
use App\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $page = Page::get()->first();
        return view('WebSite.index', compact('page'));
    }

    public function products()
    {
        $products = Product::all();
        return view('WebSite.products', compact('products'));

    }
}
