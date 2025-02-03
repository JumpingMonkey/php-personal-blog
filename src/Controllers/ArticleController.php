<?php

namespace App\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show(string $id): void
    {
        $article = Article::find($id);
        if (!$article) {
            $this->render('404');
            return;
        }
        $this->render('article', ['article' => $article]);
    }
}
