<?php

namespace App\Controllers;

use App\Models\Article;

class AdminController extends Controller
{
    private const ADMIN_USERNAME = 'admin';
    private const ADMIN_PASSWORD = 'admin123'; // In production, use proper password hashing

    public function loginForm(): void
    {
        if ($this->isAuthenticated()) {
            $this->redirect('/admin/dashboard');
        }
        $this->render('admin/login');
    }

    public function login(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === self::ADMIN_USERNAME && $password === self::ADMIN_PASSWORD) {
            $_SESSION['authenticated'] = true;
            $this->redirect('/admin/dashboard');
        }

        $this->render('admin/login', ['error' => 'Invalid credentials']);
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('/admin/login');
    }

    public function dashboard(): void
    {
        $this->requireAuth();
        $articles = Article::all();
        $this->render('admin/dashboard', ['articles' => $articles]);
    }

    public function createArticle(): void
    {
        $this->requireAuth();
        $this->render('admin/create');
    }

    public function storeArticle(): void
    {
        $this->requireAuth();
        
        $article = new Article(
            $_POST['title'],
            $_POST['content']
        );
        
        $article->save();
        $this->redirect('/admin/dashboard');
    }

    public function editArticle(string $id): void
    {
        $this->requireAuth();
        
        $article = Article::find($id);
        if (!$article) {
            $this->render('404');
            return;
        }
        
        $this->render('admin/edit', ['article' => $article]);
    }

    public function updateArticle(string $id): void
    {
        $this->requireAuth();
        
        $article = new Article(
            $_POST['title'],
            $_POST['content'],
            null,
            $id
        );
        
        $article->save();
        $this->redirect('/admin/dashboard');
    }

    public function deleteArticle(string $id): void
    {
        $this->requireAuth();
        
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        
        $this->redirect('/admin/dashboard');
    }
}
