<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\PricingModel;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\{About, Banner, Category, Faq, General, Link, Page, Partner, Pcategory, Portfolio, Post, Tag, Team, Testimonial, Service, Subscriber};
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    public function home()
    {
        $about = About::find(1);
        $general = General::find(1);
        $dishes=Dish::where('status',1)->get();
        return view ('front.home',compact('about','dishes','general'));
    }

    public function about()
    {
        $about = About::find(1);
//        $faq = Faq::all();
        $general = General::find(1);
//        $link = Link::orderBy('name','asc')->get();
//        $lpost = Post::where('status','=','PUBLISH')->orderBy('id','desc')->limit(5)->get();
//        $partner = Partner::orderBy('name','asc')->get();
//        $team = Team::orderBy('id','asc')->get();
        return view ('front.about',compact('about','general'));
    }



    public function dish($id)
    {
        $general = General::find(1);
        $dish = Dish::findorfail($id);
        $comments=Review::where('dish_id',$id)->where('status',1)->get();
        return view ('front.dish',compact('general','dish','comments'));
    }

    public function subscribe(Request $request)
    {
        \Validator::make($request->all(), [
            "email" => "required",
            "name"=>"required",
            "message"=>"required"
        ])->validate();
        $subs = new Subscriber();
        $subs->email = $request->email;
        $subs->name = $request->name;
        $subs->message = $request->message;
        if ( $subs->save()) {
            return redirect()->route('homepage')->with('success', 'You have successfully subscribed');
           } else {
            return redirect()->back();
           }
    }


    public function addComment(Request $request)
    {
        \Validator::make($request->all(), [
            "client" => "required",
            "dish" => "required",
            "body" => "required",
        ])->validate();
        $comment = new Review();
        $comment->client = $request->client;
        $comment->dish_id = $request->dish;
        $comment->email = $request->email;
        $comment->stars = $request->rating ? $request->rating : null;
        $comment->body = $request->body;
        $comment->status = 1;
        $comment->date = NOW();
        if ($comment->save()) {
            return redirect()->back()->with('success', 'Data added successfully');
        } else {
            return redirect()->back->with('error', 'Data failed to add');
        }
    }
}
