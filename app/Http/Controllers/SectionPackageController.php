<?php

namespace App\Http\Controllers;

use App\SectionPackage;
use Illuminate\Http\Request;
use App\Http\Requests\SectionPackageRequest;

class SectionPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = SectionPackage::all();
        return view('Admin.Sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionPackageRequest $request)
    {
        $section = new SectionPackage();
        $section->name = $request->name;
        $section->description = $request->description;

        if($section->save())
        {
            return redirect()->route('sections.index')->withSuccess('Sección agregada correctamente!');
        }
        else
        {
            return redirect()->route('sections.index')->withWarning('Ocurrió un error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectionPackage  $sectionPackage
     * @return \Illuminate\Http\Response
     */
    public function show(SectionPackage $section)
    {
        return view('Admin.Sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SectionPackage  $sectionPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(SectionPackage $section)
    {
        return view('Admin.Sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SectionPackage  $sectionPackage
     * @return \Illuminate\Http\Response
     */
    public function update(SectionPackageRequest $request, SectionPackage $section)
    {
        $section->name = $request->name;
        $section->description = $request->description;

        if($section->save())
        {
            return redirect()->route('sections.index')->withSuccess('Sección actualizada correctamente!');
        }
        else
        {
            return redirect()->route('sections.index')->withWarning('Ocurrió un error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SectionPackage  $sectionPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = SectionPackage::findOrFail($id);
        $section->delete();

        return redirect()->route('sections.index');
    }
}
