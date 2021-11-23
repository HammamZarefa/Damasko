<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();
        return view ('admin.page.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['slug'] = \Str::slug(request('title'));

        $page = Page::create($data);

        if ($page) {

                return redirect()->route('admin.page')->with('success', 'Data Berhasil Ditambahkan');
        
               } else {
                   
                return redirect()->route('admin.page.create')->with('error', 'Data Gagal Ditambahkan');
        
               }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view ('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $data = $request->all();

        $data['slug'] = \Str::slug(request('title'));

        $update = $page->update($data);

        if ($update) {

                return redirect()->route('admin.page')->with('success', 'Data Berhasil Diperbarui');
        
               } else {
                   
                return redirect()->route('admin.page.edit')->with('error', 'Data Gagal Diperbarui');
        
               }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        $page->delete();

        return redirect()->route('admin.page')->with('success', 'Data Berhasil Dihapus');
    }
}