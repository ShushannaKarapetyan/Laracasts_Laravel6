<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    //Render a list of a resource
    public function index(){
        $articles = Article::all();
        return view('articles.index',['articles'=>$articles]);
    }

    //Show a single resource
    public function show($id){
        $article = Article::find($id);
        return view('articles.show_article',['article'=>$article]);
    }

    //Shows a view to create a new resource
    public function create(){

    }

    //Persist the new resource
    public function store(){

    }

    //Shows a view to edit an existing resource
    public function edit(){

    }

    //Persist the edited resource
    public function update(){

    }

    //Delete the resource
    public function destroy(){

    }


}