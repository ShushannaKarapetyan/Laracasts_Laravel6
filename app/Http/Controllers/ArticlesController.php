<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    //Render a list of a resource
    public function index(){
        if(request('tag')){
            $articles = Tag::where('name',request('tag'))->firstOrFail()->articles;
        } else{
            $articles = Article::latest()->get();
        }
        return view('articles.index',['articles'=>$articles]);
    }

    //Show a single resource
    public function show(/*$id*/ Article $article){

       // $article = Article::findOrFail($id); // redirects 404 page, if the 'id' isn't found

        return view('articles.show_article',['article'=>$article]);
    }

    //Shows a view to create a new resource
    public function create(){

        return view('articles.create',[
            'tags'=>Tag::all()
        ]);
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
         /*Article::create($this->validateArticle());*/

         $this->validateArticle();
         $article = new Article(request(['title','excerpt','body']));
         $article->user_id = 1;
         $article->save();

         $article->tags()->attach(request('tags'));


        return redirect(route('articles.index'));
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

        /*return redirect(route('articles.show', $article));*/

        return redirect($article->path());

    }

    protected function validateArticle(){
        return request()->validate([
            'title'=> 'required',
            'excerpt'=>'required',
            'body'=>'required',
            'tags'=>'exists:tags,id' //if the selected tag isn't found, sets a validation error "The selected tags is invalid."
        ]);
    }

    //Delete the resource
    public function destroy(){

    }


}
