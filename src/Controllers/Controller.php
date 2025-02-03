<?php

namespace App\Controllers;

class Controller
{
    protected function render(string $template, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../../templates/' . $template . '.php';
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }

    protected function isAuthenticated(): bool
    {
        return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
    }

    protected function requireAuth(): void
    {
        if (!$this->isAuthenticated()) {
            $this->redirect('/admin/login');
        }
    }
}
