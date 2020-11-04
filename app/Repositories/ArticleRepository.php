<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function getById(int $id): Article
    {
        $article = query()
            ->select('*')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        return new Article(
            (int) $article['id'],
            $article['title'],
            $article['content'],
            $article['created_at'],
        );
    }
}