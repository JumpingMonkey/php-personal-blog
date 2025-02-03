<?php

namespace App\Models;

use Parsedown;

class Article
{
    private string $id;
    private string $title;
    private string $content;
    private string $date;

    private static string $storageDir = __DIR__ . '/../../storage/articles/';

    public function __construct(string $title, string $content, ?string $date = null, ?string $id = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->date = $date ?? date('Y-m-d');
        $this->id = $id ?? uniqid();
    }

    public function save(): void
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'date' => $this->date
        ];

        file_put_contents(
            self::$storageDir . $this->id . '.json',
            json_encode($data, JSON_PRETTY_PRINT)
        );
    }

    public static function all(): array
    {
        $articles = [];
        foreach (glob(self::$storageDir . '*.json') as $file) {
            $articles[] = self::fromFile($file);
        }
        usort($articles, fn($a, $b) => strtotime($b->date) - strtotime($a->date));
        return $articles;
    }

    public static function find(string $id): ?self
    {
        $file = self::$storageDir . $id . '.json';
        return file_exists($file) ? self::fromFile($file) : null;
    }

    public function delete(): void
    {
        $file = self::$storageDir . $this->id . '.json';
        if (file_exists($file)) {
            unlink($file);
        }
    }

    private static function fromFile(string $file): self
    {
        $data = json_decode(file_get_contents($file), true);
        return new self(
            $data['title'],
            $data['content'],
            $data['date'],
            $data['id']
        );
    }

    public function getHtmlContent(): string
    {
        $parsedown = new Parsedown();
        return $parsedown->text($this->content);
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getContent(): string { return $this->content; }
    public function getDate(): string { return $this->date; }
}
