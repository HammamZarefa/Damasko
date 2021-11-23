<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pcategory;

class PCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcategory = Pcategory::orderBy('id','desc')->get();

        return view('admin.pcategory.index',compact('pcategory'));
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
            "name" => "required|unique:pcategories"     
        ])->validate();
        
        $pcategory = new Pcategory();
        $pcategory->name = $request->name;

        if ( $pcategory->save()) {

            return redirect()->route('admin.pcategory')->with('success', 'Data added successfully');
    
           } else {
               
            return redirect()->route('admin.pcategory')->with('error', 'Data failed to add');
    
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
        $pcategory = Pcategory::findOrFail($id);

        return view('admin.pcategory.edit',compact('pcategory'));
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
            "name" => "required"     
        ])->validate();
        
        $pcategory = Pcategory::findOrFail($id);
        $pcategory->name = $request->name;

        if ( $pcategory->save()) {

            return redirect()->route('admin.pcategory')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->route('admin.pcategory.create')->with('error', 'Data failed to update');
    
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
        $pcategory = Pcategory::findOrFail($id);
        $pcategory->delete();

        return redirect()->route('admin.pcategory')->with('success', 'Data deleted successfully');
    }
}
