<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

        // public function __construct()
        // {
        //     return $this->middleware('auth')->except('home');
        // }


    public function home()
    {
        $blogs=Blog::all();
        return view('blogs.Home',['blogs'=>$blogs,'tab'=>"current"]);
    }

   

    public function details($id)
    {
        $blog=Blog::findOrFail($id);
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

        if($req->hasFile('photo'))
        {
            // $path= $req->photo->store('images');
            $path= Storage::putFile("images",$req->photo);
            $blog->photo=$path;

        }
        $blog->save();
        return redirect('/');
    }


    public function show($id)
    {
        $blog=Blog::findOrFail($id);
        $categories=Category::all();

        $this->authorize('view', $blog);

        return view('blogs.show',['blog'=>$blog,"categories"=>$categories]);
    }

    public function updateBlog(BlogRequest $req,$id)
    {
       
        $blog=Blog::findOrFail($id);

        $this->authorize('update', $blog);

        $blog->title=$req->title;
        $blog->content=$req->content;
        if($req->hasFile('photo'))
        {
            // $path= $req->photo->store('images');
           if($blog->photo)
           {
               Storage::delete($blog->photo);
           }
            $path= Storage::putFile("images",$req->photo);
            $blog->photo=$path;

        }
        $blog->save();

      
        return redirect('/');

    }


    public function destroy($id)
    {
         $blog= Blog::findOrFail($id);

        $this->authorize('delete', $blog);

        $blog->delete();



        return back();
    }





    //   when we work with softDelete 



    public function restore($id)
    {

        $blog= Blog::onlyTrashed()
        ->where('id', $id)
        ->first();

        $this->authorize('restore', $blog);

        $blog->restore();

       

        return redirect('/');
    }


    public function forceDelete($id)
    {
        $blog= Blog::onlyTrashed()
        ->where('id',$id)
        ->first();

        $this->authorize('forceDelete', $blog);

        $blog->forceDelete();

        return back();

       
    }

    public function trashed_blog()
    {
        $blogs=Blog::onlyTrashed()
        ->where('user_id',Auth::user()->id)
        ->paginate(3);
        return view('blogs.Home',['blogs'=>$blogs , 'tab'=>"trashed"]);
    }

    public function all()
    {
        $blogs=Blog::withTrashed()
        ->where('user_id',Auth::user()->id)
        ->paginate(3);
        return view('blogs.Home',['blogs'=>$blogs , 'tab'=>"with_trashed"]);

    }
   
   
}

