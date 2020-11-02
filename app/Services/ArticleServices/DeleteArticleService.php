<?php

namespace App\Services\ArticleServices;

class DeleteArticleService
{
    public function execute(int $id): void
    {
        query()
            ->delete('articles')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }
}