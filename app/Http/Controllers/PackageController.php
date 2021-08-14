<?php

namespace App\Http\Controllers;

use App\Package;
use App\SectionPackage;
use App\ItemPackage;
use Illuminate\Http\Request;

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
    public function store(Request $request)
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
        if($request->file('url_video1'))
        {
            $package->url_video1 = $request->file('url_video1')->store('packages', 'public');
        }
        if($request->file('url_video2'))
        {
            $package->url_video2 = $request->file('url_video2')->store('packages', 'public');
        }


        if($package->save())
        {   
            for($i=0; $i<count($request->item); $i++)
            {
                $item_package = new ItemPackage();
                $item_package->package_id = $package->id;
                $item_package->name = $request->item[$i];
                $item_package->save();
            }
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
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);

    }
}
