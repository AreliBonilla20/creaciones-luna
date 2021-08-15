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
        $page_content = Page::get()->first();
        return view('Admin.Page.index', compact('page_content'));
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
        $page_content = new Page();
        $page_content->description_header = $request->description_header;
        $page_content->who_we_are = $request->who_we_are;
        
        if($page_content->save())
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
    public function edit(Page $page_content)
    {
        return view('Admin.Page.edit', compact('page_content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page_content)
    {
    
        $page_content->description_header = $request->description_header;
        $page_content->who_we_are = $request->who_we_are;
        
        if($page_content->save())
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
        //
    }
}
