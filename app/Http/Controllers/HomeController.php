<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestArticles = Article::getLastArticles();
        $articles= Article::query()
            ->paginate(10);

        return view('home', compact('articles', 'latestArticles'));



    }
}
