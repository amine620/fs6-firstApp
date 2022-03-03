<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

        // public function __construct()
        // {
        //     return $this->middleware('auth')->except('home');
        // }


    public function home()
    {
        $blogs=Blog::all();

        return view('blogs.Home',['blogs'=>$blogs]);
    }

    public function details($id)
    {
        $blog=Blog::findOrFail($id);

        // dd($blog);
        return view('blogs.details',['blog'=>$blog]);
    }
  
    public function create()
    {
        $categories=Category::all();
        return view('blogs.create',['categories'=>$categories]);
    }

    public function store(BlogRequest $req)
    {

        $blog=new Blog();
        $blog->title=$req->title;
        $blog->content=$req->content;
        $blog->user_id=Auth::user()->id;
        $blog->category_id=$req->category_id;
        $blog->save();
        return redirect('home');
    }


    public function show($id)
    {
        $blog=Blog::find($id);

        $this->authorize('view', $blog);

        return view('blogs.show',['blog'=>$blog]);
    }

    public function updateBlog(BlogRequest $req,$id)
    {
       
        $blog=Blog::find($id);

        $this->authorize('update', $blog);

        $blog->title=$req->title;
        $blog->content=$req->content;
        $blog->save();

      
        return redirect('home');

    }


    public function destroy($id)
    {
         $blog= Blog::findOrFail($id);
        $this->authorize('delete', $blog);
        $blog->delete();

        return back();
    }



 
   
    public function getData()
    {
        //   $blogs=Category::find(5)->blogs;

        //   foreach ($blogs as $blog) {
              
        //     echo $blog->title;
        //     echo '<br>';
        //     echo $blog->content;
        //     echo '<hr>';
        //   }

        // $category=Blog::findOrFail(8)->category;

        //  echo $category->name;

        // // get all blogs==> array contains 'second blog ' in title
        // $blogs=Blog::where('title',"second blog")->get();

        // // get first blog==> object  contains 'second blog ' in title
        // $blogs=Blog::where('title',"second blog")->first();


        // // select * from categories inner join blogs on category.id=blog.category_id
        // categories with blogs
        // $categories=  Category::whereHas('blogs')->get();

         // select * from categories inner join blogs on category.id!=blog.category_id
        //  categories with none blogs
        //  $categories=  Category::whereDoesntHave('blogs')->get();


        // get categories with blogs
        // $categories=Category::with('blogs')->get();

        // // get categories with blogs
        // $blogs=Blog::with('category')->get();


        // $categories=Category::withCount('blogs')->get();


        //  return response()->json(['categories'=>$categories]);



    }
}

