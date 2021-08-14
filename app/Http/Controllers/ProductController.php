<?php

namespace App\Http\Controllers;

use App\Product;
use App\CategoryProduct;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('Admin.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = CategoryProduct::all();
        return view('Admin.Products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->available = $request->available;

        if($request->file('url_image'))
        {
            $product->url_image = $request->file('url_image')->store('products', 'public');
        }

        if($product->save())
        {
            return redirect()->route('products.index')->withSuccess('Producto agregado correctamente!');
        }
        else
        {
            return redirect()->route('products.index')->withWarning('Ocurrió un error!');
        }
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {   
        return view('Admin.Products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $categories = CategoryProduct::all();
        return view('Admin.Products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, Product $product)
    {   
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->available = $request->available;

        if($request->file('url_image'))
        {   
            Storage::disk('public')->delete($product->url_image);
            $product->url_image = $request->file('url_image')->store('products', 'public');
        }

        if($product->save())
        {
            return redirect()->route('products.index')->withSuccess('Producto actualizado correctamente!');
        }
        else
        {
            return redirect()->route('products.index')->withWarning('Ocurrió un error!');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
