<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Portfolio, Pcategory};

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::orderBy('id','desc')->get();

        return view('admin.portfolio.index',compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Pcategory::get();
        
        return view('admin.portfolio.create',compact('categories'));
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
            "category" => "required",
            "desc" => "required"
        ])->validate();

        $portfolio = new Portfolio();
        $portfolio->pcategory_id = $request->category;
        $portfolio->name = $request->name;
        $portfolio->slug = \Str::slug($request->name);
        $portfolio->client = $request->client;
        $portfolio->desc = $request->desc;
        $portfolio->date = $request->date;

        $cover = $request->file('cover');

        if($cover){
        $cover_path = $cover->store('images/portfolio', 'public');

        $portfolio->cover = $cover_path;
        }

        if ($portfolio->save()) {

                return redirect()->route('admin.portfolio')->with('success', 'Data added successfully');
        
               } else {
                   
                return redirect()->route('admin.portfolio.create')->with('error', 'Data failed to add');
        
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
        $portfolio = Portfolio::findOrFail($id);
        $categories = Pcategory::get();

        return view('admin.portfolio.edit',compact('portfolio','categories'));
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
            "category" => "required",
            "desc" => "required"
        ])->validate();

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->pcategory_id = $request->category;
        $portfolio->name = $request->name;
        $portfolio->client = $request->client;
        $portfolio->desc = $request->desc;
        $portfolio->date = $request->date;


        $new_cover = $request->file('cover');

        if($new_cover){
        if($portfolio->cover && file_exists(storage_path('app/public/' . $portfolio->cover))){
            \Storage::delete('public/'. $portfolio->cover);
        }

        $new_cover_path = $new_cover->store('images/portfolio', 'public');

        $portfolio->cover = $new_cover_path;
    
        }

        if ($portfolio->save()) {

                return redirect()->route('admin.portfolio')->with('success', 'Data updated successfully');
        
               } else {
                   
                return redirect()->route('admin.portfolio.edit')->with('error', 'Data failed to update');
        
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
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('admin.portfolio')->with('success', 'Data deleted successfully');
    }
}