<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
use App\Controllers\AdminController;

session_start();

$router = new Router();

// Guest routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/article/{id}', [ArticleController::class, 'show']);

// Admin routes
$router->get('/admin/login', [AdminController::class, 'loginForm']);
$router->post('/admin/login', [AdminController::class, 'login']);
$router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$router->get('/admin/articles/create', [AdminController::class, 'createArticle']);
$router->post('/admin/articles', [AdminController::class, 'storeArticle']);
$router->get('/admin/articles/{id}/edit', [AdminController::class, 'editArticle']);
$router->post('/admin/articles/{id}', [AdminController::class, 'updateArticle']);
$router->post('/admin/articles/{id}/delete', [AdminController::class, 'deleteArticle']);

$router->resolve($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
