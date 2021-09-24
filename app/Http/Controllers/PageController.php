<?php

namespace App\Http\Controllers;

use App\Page;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $page = Page::get()->first();
        return view('Admin.Page.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page();
        $page->description_header = $request->description_header;
        $page->who_we_are = $request->who_we_are;
        
        if($page->save())
        {
            return redirect()->route('page.index')->withSuccess('Contenido agregado correctamente!');
        }
        else
        {
            return redirect()->route('page.index')->withWarning('Ocurrió un error!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('Admin.Page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
    
        $page->description_header = $request->description_header;
        $page->who_we_are = $request->who_we_are;
        
        if($page->save())
        {
            return redirect()->route('page.index')->withSuccess('Contenido actualizado correctamente!');
        }
        else
        {
            return redirect()->route('page.index')->withWarning('Ocurrió un error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('page.index');
    }
}
