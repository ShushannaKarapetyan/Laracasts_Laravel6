<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $name = request('name');
    //it's the same
    $name = $request->name;

    return view('test',[
        'name'=>$name
    ]);

    //url   /?name=<script>alert("hi");</script>
});



// {post} is any variable which coming from url, f.e id of post
// url /posts/1

/*Route::get('posts/{post}', function ($post){
    //return $post;

    $posts = [
        'my-first-post' => 'Hello, this is my first blog post!',
        'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    ];

    if(!array_key_exists($post,$posts)){
        abort(404,"Sorry, that post was not found.");
    }

    return view('post', [
        'post' => $posts[$post]  ?? "Nothing here yet."    //url is /posts/my-first-post ,  $posts['my-first-post']
    ]);
});*/

Route::get('posts/{post}', 'PostsController@show');

Route::get('/',function (){
    return view('welcome');
});

Route::get('/contact',function (){
    return view('contact');
});

Route::get('/about',function (){
    //$articles = \App\Article::take(2)->get();
    //$articles = \App\Article::paginate(2);
    //$articles = \App\Article::latest('updated_at')->get();
    //return $articles;


    return view('about',[
        'articles'=> App\Article::take(3)->latest()->get()
    ]);
});

Route::get('articles','ArticlesController@index');
Route::get('articles/{article}','ArticlesController@show');

