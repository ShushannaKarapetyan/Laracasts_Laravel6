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
    public function show(/*$id*/ Article $article){

       // $article = Article::findOrFail($id); // redirects 404 page, if the 'id' isn't found

        return view('articles.show_article',['article'=>$article]);
    }

    //Shows a view to create a new resource
    public function create(){
        return view('articles.create');
    }

    //Persist the new resource
    public function store(){
        #CASE 1
        /*$validatedAttributes = request()->validate([
            'title'=> 'required',
            'excerpt'=>'required',
            'body'=>'required',
        ]);*/

        //Article::create($validatedAttributes);

        //CASE 2
        /*Article::crete(request()->validate([
            'title'=> 'required',
            'excerpt'=>'required',
            'body'=>'required',
        ]));*/

        #CASE 3

        /*$article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();*/

        // CASE 4
        /*Article::create([
            'title'=>request('title'),
            'excerpt'=>request('excerpt'),
            'body'=>request('body')
        ]);*/

        //CASE 5
         Article::create($this->validateArticle());


        return redirect('articles');
    }

    //Shows a view to edit an existing resource
    public function edit(/*$id*/ Article $article){
        //find the article associated with the id
        /*$article = Article::findOrFail($id);*/
        return view('articles.edit',compact('article'));
    }

    //Persist the edited resource
    public function update(/*$id*/ Article $article){
        #CASE 1
        /*$article = Article::findOrFail($id);*/
        /*$article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();*/

        #CASE 2
        /*$article->update(request()->validate([
           'title'=> 'required',
           'excerpt'=>'required',
           'body'=>'required',
       ]));*/

        #CASE 3
        $article->update($this->validateArticle());

        return redirect('articles/'.$article->id);

    }

    protected function validateArticle(){
        return request()->validate([
            'title'=> 'required',
            'excerpt'=>'required',
            'body'=>'required',
        ]);
    }

    //Delete the resource
    public function destroy(){

    }


}
