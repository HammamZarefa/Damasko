<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes=Dish::all();
        return view('admin.dish.index',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dish.create');
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
            "cover" => "required",
            "name" => "required",
            "desc" => "required"
        ])->validate();
        $dish = new Dish();
        $dish->summary = $request->summary;
        $dish->keywords = $request->keywords;
        $dish->name = $request->name;
        $dish->slug = \Str::slug($request->name['en']);
        $dish->status = $request->status ? 1 : 0;
        $dish->desc = $request->desc;
        $cover = $request->file('cover');
        if($cover){
            $cover_path = $cover->store('dishes.index', 'public');
            $dish->cover = $cover_path;
        }
        if ($dish->save()) {
            return redirect()->route('dishes.index')->with('success', 'Data added successfully');
        } else {
            return redirect()->route('dishes.index')->with('error', 'Data failed to add');
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
        $dish=Dish::findorfail($id);
        return view('admin.dish.edit',compact('dish'));
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
            "desc" => "required"
        ])->validate();

        $dish = Dish::findOrFail($id);
        $dish->summary = $request->summary;
        $dish->keywords = $request->keywords;
        $dish->name = $request->name;
        $dish->slug = \Str::slug($request->name['en']);
        $dish->status = $request->status ? 1 : 0;
        $dish->desc = $request->desc;
        $new_cover = $request->file('cover');

        if($new_cover){
            if($dish->cover && file_exists(storage_path('app/public/' . $dish->cover))){
                \Storage::delete('public/'. $dish->cover);
            }
            $new_cover_path = $new_cover->store('images/dishes', 'public');
            $dish->cover = $new_cover_path;
        }
        if ($dish->save()) {
            return redirect()->route('dishes.index')->with('success', 'Data updated successfully');

        } else {
            return redirect()->route('dishes.index')->with('error', 'Data failed to update');

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
        $dish=Dish::findorfail($id);
        $dish->status==1 ? $dish->status=0 :$dish->status=1;
        $dish->save();
        return redirect()->route('dishes.index')->with('success', 'Status updated successfully');
    }
}
