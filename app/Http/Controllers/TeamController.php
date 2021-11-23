<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::orderBy('id','desc')->get();

        return view('admin.team.index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->twitter = $request->twitter;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;
        $team->linkedin = $request->linkedin;

        $photo = $request->file('photo');

        if($photo){
        $cover_path = $photo->store('images/team', 'public');

        $team->photo = $cover_path;
        }

        if ( $team->save()) {

            return redirect()->route('admin.team')->with('success', 'Data added successfully');
    
           } else {
               
            return redirect()->route('admin.team.create')->with('error', 'Data failed to add');
    
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
        $team = Team::findOrFail($id);

        return view('admin.team.edit',compact('team'));
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
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->position = $request->position;
        $team->twitter = $request->twitter;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;
        $team->linkedin = $request->linkedin;

        $new_photo = $request->file('photo');

        if($new_photo){
        if($team->photo && file_exists(storage_path('app/public/' . $team->photo))){
            \Storage::delete('public/'. $team->photo);
        }

        $new_cover_path = $new_photo->store('images/team', 'public');

        $team->photo = $new_cover_path;
        }

        if ( $team->save()) {

            return redirect()->route('admin.team')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->route('admin.team.edit')->with('error', 'Data failed to update');
    
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
        $team = Team::findOrFail($id);

        $team->delete();

        return redirect()->route('admin.team')->with('success', 'Data deleted successfully');
    

    }
}
