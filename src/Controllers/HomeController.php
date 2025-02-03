<?php

namespace App\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index(): void
    {
        $articles = Article::all();
        $this->render('home', ['articles' => $articles]);
    }
}
