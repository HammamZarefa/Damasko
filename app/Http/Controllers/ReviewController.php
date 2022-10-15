<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $comments=Review::all();
        return view('admin.comment.index',compact('comments'));
    }


    public function changeStatus( $id)
    {
        $comment=Review::findorfail($id);
        $comment->status==1 ? $comment->status=0 :$comment->status=1;
        $comment->save();
        return redirect()->route('admin.comments')->with('success', 'Status updated successfully');
    }


}
