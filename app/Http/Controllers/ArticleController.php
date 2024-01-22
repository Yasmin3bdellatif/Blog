<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->approved()
            ->get();

        //dd($articles);

        return view('articles.index',
        [
            'articles' =>$articles
        ]);
    }
    public function create()
    {
        return view('articles.create', [
            'categories'=>Category::all(),
            'tags'=>Tag::all()
        ]);
    }


    public function store()
    {
        //validate the request from the user
        request()->validate([
            'title' => 'required|string|max:255',
            'body' =>'required|string',
            'tags.*' =>'exists:tags,id',
            'categories.*' => 'exists:categories,id'
        ]);

        //create the article in database
        $article = Article::create([
            'title' =>request('title'),
            'body' =>request('body'),
            //get the person who logged in and get his id
            'employee_id' => Auth::id()
        ]);

        //link article to tags
        $article
            ->tags()
            ->sync(request('tags'));

        //link article to categories
        $article
            ->caregories()
            ->sync(request('categories'));

        return redirect()->route('articles.index');
    }


    public function show(Article $article)
    {
        return view('articles.show',[
            'article' => $article
        ]);
    }
    public function edit(Article $article)
    {
        //roue model binding
        return view('articles.edit', compact('article'));
    }
    public function update(Article $article)
    {
        //validate the request from the user
        request()->validate([
            'title' => 'required|string',
            'body' =>'required|string|max:255'
        ]);

        $article->update(request()->all());

        return redirect()->route('articles.index');

    }
    public function desrtoy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    /*public function validateFunction()
    {

    }*/
}
