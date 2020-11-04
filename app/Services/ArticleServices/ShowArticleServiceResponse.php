<?php

namespace App\Services\ArticleServices;

use App\Models\Article;

class ShowArticleServiceResponse
{
    private Article $article;
    private array $comments;
    private array $tags;

    public function __construct(Article $article, array $comments, array $tags)
    {
        $this->article = $article;
        $this->comments = $comments;
        $this->tags = $tags;
    }

    public function article(): Article
    {
        return $this->article;
    }

    public function comments(): array
    {
        return $this->comments;
    }

    public function tags(): array
    {
        return $this->tags;
    }
}