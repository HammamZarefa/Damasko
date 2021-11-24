<?php

namespace App\Http\Controllers;

use App\Models\PricingModel;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricing = PricingModel::orderBy('id')->get();
        return view('admin.pricing.index',compact('pricing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricing.create');
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
            "name" => "required",
            "short" => "required",
            "price" => "required",
            "items"=>"required"
        ])->validate();

        $pricing = new PricingModel();
        $pricing->name = $request->name;
        $pricing->short = $request->short;
        $pricing->price = $request->price;
        $pricing->items=$request->items;


        if ( $pricing->save()) {

            return redirect()->route('admin.pricing')->with('success', 'Data added successfully');

        } else {

            return redirect()->route('admin.pricing')->with('error', 'Data failed to add');

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
        $pricing = PricingModel::findOrFail($id);

        return view('admin.pricing.edit',compact('pricing'));
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
            "name" => "required",
            "short" => "required",
            "price" => "required",
            "items"=>"required"
        ])->validate();

        $pricing = PricingModel::findOrFail($id);
        $pricing->name = $request->name;
        $pricing->short = $request->short;
        $pricing->price = $request->price;
        $pricing->items=$request->items;


        if ( $pricing->save()) {

            return redirect()->route('admin.pricing')->with('success', 'Data updated successfully');

        } else {

            return redirect()->route('admin.pricing')->with('error', 'Data failed to update');

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
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();

        return redirect()->route('admin.pricing')->with('success', 'Data deleted successfully');
    }
}
