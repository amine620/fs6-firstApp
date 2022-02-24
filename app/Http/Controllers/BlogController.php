<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home()
    {
        $blogs=Blog::all();

        return view('blogs.Home',['blogs'=>$blogs]);
    }

    public function contact()
    {
        return view('blogs.Contact');
    }

    public function about()
    {
        return view('blogs.About');
    }

   
}

