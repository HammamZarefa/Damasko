<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $contacts=Subscriber::all();
        return view('admin.contacts',compact('contacts'));
    }
}
