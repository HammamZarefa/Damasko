<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::orderBy('id','desc')->get();

        return view('admin.tag.index',compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "name" => "required|unique:tags",
            "keyword" => "required",
            "meta_desc" => "required"     
        ])->validate();
        
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = \Str::slug($request->name);
        $tag->keyword = $request->keyword;
        $tag->meta_desc = $request->meta_desc;

        if ( $tag->save()) {

            return redirect()->route('admin.tag')->with('success', 'Data added successfully');
    
           } else {
               
            return redirect()->route('admin.tag')->with('error', 'Data failed to add');
    
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
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit',compact('tag'));
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
        \Validator::make($request->all(), [
            "name" => "required|unique:tags",
            "keyword" => "required",
            "meta_desc" => "required"     
        ])->validate();
        
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = \Str::slug($request->name);
        $tag->keyword = $request->keyword;
        $tag->meta_desc = $request->meta_desc;

        if ( $tag->save()) {

            return redirect()->route('admin.tag')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->route('admin.tag')->with('error', 'Data failed to update');
    
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
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('admin.tag')->with('success', 'Data deleted successfully');
    }
}
