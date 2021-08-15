<?php

namespace App\Http\Controllers;

use App\Package;
use App\SectionPackage;
use App\ItemPackage;
use App\Http\Requests\PackageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('Admin.Packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = SectionPackage::all();
        return view('Admin.Packages.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {  
       
        $package = new Package();
        $package->section_id = $request->section_id;
        $package->name = $request->name;
        $package->description = $request->description;
        $package->conditions = $request->conditions;
        $package->price = $request->price;
        $package->amount_people = $request->amount_people;

        if($request->file('url_image1'))
        {   
            $package->url_image1 = $request->file('url_image1')->store('packages', 'public');
        }
        if($request->file('url_image2'))
        {
            $package->url_image2 = $request->file('url_image2')->store('packages', 'public');
        }
        if($request->file('url_image3'))
        {
            $package->url_image3 = $request->file('url_image3')->store('packages', 'public');
        }
        if($request->file('url_video'))
        {
            $package->url_video = $request->file('url_video')->store('packages', 'public');
        }
    

        if($package->save())
        {   
            app('App\Http\Controllers\ItemPackageController')->store($request, $package);
            return redirect()->route('packages.index')->withSuccess('Paquete agregado correctamente!');
        }
        else
        {
            return redirect()->route('packages.index')->withWarning('Ocurrió un error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('Admin.Packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {   
        $sections = SectionPackage::all();
        return view('Admin.Packages.edit', compact('package', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        $package->section_id = $request->section_id;
        $package->name = $request->name;
        $package->description = $request->description;
        $package->conditions = $request->conditions;
        $package->price = $request->price;
        $package->amount_people = $request->amount_people;

        if($request->file('url_image1'))
        {   
            Storage::disk('public')->delete($product->url_image1);
            $package->url_image1 = $request->file('url_image1')->store('packages', 'public');
        }
        if($request->file('url_image2'))
        {
            Storage::disk('public')->delete($product->url_image2);
            $package->url_image2 = $request->file('url_image2')->store('packages', 'public');
        }
        if($request->file('url_image3'))
        {   
            Storage::disk('public')->delete($product->url_image3);
            $package->url_image3 = $request->file('url_image3')->store('packages', 'public');
        }
        if($request->file('url_video'))
        {   
            Storage::disk('public')->delete($product->url_video);
            $package->url_video = $request->file('url_video')->store('packages', 'public');
        }
       

        if($package->save())
        {   
            app('App\Http\Controllers\ItemPackageController')->update($request, $package);
            return redirect()->route('packages.index')->withSuccess('Paquete actualizado correctamente!');
        }
        else
        {
            return redirect()->route('packages.index')->withWarning('Ocurrió un error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        app('App\Http\Controllers\ItemPackageController')->destroy($id);
        $package = Package::findOrFail($id)->delete();

        return redirect()->route('packages.index');

    }
}
