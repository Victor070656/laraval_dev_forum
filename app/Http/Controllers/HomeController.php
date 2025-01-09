<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(Request $request){

    }

    public function posts(Request $request){
        return view("discussion");
    }

    public function postDiscussion(Request $request)
    {
        return view("post");
    }
}
