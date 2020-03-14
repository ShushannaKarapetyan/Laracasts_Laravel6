<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function show($slug){

        //$post = DB::table('posts')->where('slug',$slug )->first();
        # it's the same
        /*$post = Post::where('slug',$slug)->first();

        if(!$post){
            abort(404);
        }*/

        // $post = Post::where('slug',$slug)->firstOrFail(); //when we use OrFail, and if the page is not found, redirects  to 404 page

        return view('post', [
            'post'=>$post = Post::where('slug',$slug)->firstOrFail()
        ]);
    }
}
