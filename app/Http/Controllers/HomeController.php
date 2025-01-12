<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(Request $request)
    {
        // TODO: Implement search functionality
    }

    public function posts(Request $request)
    {
        return view('discussion');
    }

    public function postDiscussion(Request $request)
    {
        return view('post');
    }

    public function show(Discussion $discussion)
    {
        return view('discussions.show', compact('discussion'));
    }
}
