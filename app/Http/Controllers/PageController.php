<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        $latest_posts = Post::latest()->get()->take(2);
        return view('main')->with('latest_posts', $latest_posts);
    }
    public function about()
    {
        return view('about');
    }
    public function service()
    {
        return view('service');
    }
    public function price()
    {
        return view('price');
    }
    public function contact()
    {
        return view('contact');
    }
    public function posts()
    {
        return view('posts');
    }
}
