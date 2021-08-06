<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
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
        $products = Product::all();
        return view('WebSite.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('WebSite.Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
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
        return view('WebSite.Products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('WebSite.Products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {   
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
    public function destroy(Product $product)
    {
        //
    }
}
