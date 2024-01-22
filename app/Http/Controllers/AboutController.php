<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about ()
    {
        $articles=Article::getLastArticles();
        return view('about', compact('articles'));
    }
}
