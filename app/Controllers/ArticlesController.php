<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Services\ArticleServices\DeleteArticleService;
use App\Services\ArticleServices\ShowArticleService;

class ArticlesController
{
    private array $articles;

    public function index()
    {
        $articlesQuery = query()
            ->select('*')
            ->from('articles')
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        $articles = [];

        foreach ($articlesQuery as $article)
        {
            $articles[] = new Article(
                (int) $article['id'],
                $article['title'],
                $article['content'],
                $article['created_at']
            );
        }

        return require_once __DIR__  . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {
        $response = (new ShowArticleService())->execute((int) $vars['id']);

        $article = $response->article();
        $comments = $response->comments();
        $tags = $response->tags();

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }

    public function delete(array $vars)
    {
        $service = new DeleteArticleService();
        $service->execute((int) $vars['id']);

        header('Location: /articles/');
    }
}