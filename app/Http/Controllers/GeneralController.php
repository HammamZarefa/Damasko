<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PricingModel;
use Illuminate\Http\Request;
use App\Models\{About, General, Page, Post, Team, User};

class GeneralController extends Controller
{
    public function dashboard(){
        $admin = User::count();
        $dishes = Portfolio::count();
        $blog = Post::count();
        $page = Page::count();
        $general=General::find(1);
        $pricing=PricingModel::count();
        return view ('admin.dashboard', compact('admin','blog','page','dishes','general','pricing'));
    }

    public function general(){
        $general = General::find(1);
        return view ('admin.general',[
            'general' => $general
        ]);
    }

    public function generalUpdate(Request $request)
    {
        \Validator::make($request->all(), [
     
            "title" => "required",
            "address1" => "required",
            "phone" => "required" ,
            "email" => "required",
            "footer" => "required",
            "gmaps" => "required"       
        ])->validate();

        $general = General::find(1);
        $general->title = $request->title;
        $general->address1 = $request->address1;
        $general->address2 = $request->address2;
        $general->phone = $request->phone;
        $general->email = $request->email;
        $general->twitter = $request->twitter;
        $general->facebook = $request->facebook;
        $general->instagram = $request->instagram;
        $general->linkedin = $request->linkedin;
        $general->footer = $request->footer;
        $general->gmaps = $request->gmaps;
        $general->tawkto = $request->tawkto;
        $general->disqus = $request->disqus;
        $general->sharethis = $request->sharethis;
        $general->gverification = $request->gverification;
        $general->keyword = $request->keyword;
        $general->meta_desc = $request->meta_desc;

        $new_logo = $request->file('logo');

        if($new_logo){
        if($general->logo && file_exists(storage_path('app/public/' . $general->logo))){
            \Storage::delete('public/'. $general->logo);
        }

        $new_cover_path = $new_logo->store('images/general', 'public');

        $general->logo = $new_cover_path;
        }

        $new_favicon = $request->file('favicon');

        if($new_favicon){
        if($general->favicon && file_exists(storage_path('app/public/' . $general->favicon))){
            \Storage::delete('public/'. $general->favicon);
        }

        $new_cover_path = $new_favicon->store('images/general', 'public');

        $general->favicon = $new_cover_path;
        }


        // dd($general);
        if ( $general->save()) {

            return redirect()->route('admin.general')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->route('admin.general')->with('error', 'Data failed to update');
    
           }
    }

    public function about()
    {
        $about = About::find(1);
        return view ('admin.about',[
            'about' => $about
        ]);
    }

    public function aboutUpdate(Request $request)
    {
        $about = About::find(1);
        $about->title = $request->title;
        $about->subject = $request->subject;
        $about->desc = $request->desc;

        if ( $about->save()) {

            return redirect()->route('admin.about')->with('success', 'Data updated successfully');
    
           } else {
               
            return redirect()->route('admin.about')->with('error', 'Data failed to update');
    
           }

    }
}
