<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function getAllByArticleId(int $articleId): array
    {
        $commentsQuery = query()
            ->select('*')
            ->from('comments')
            ->where('article_id = :articleId')
            ->setParameter('articleId', $articleId)
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        $comments = [];

        foreach ($commentsQuery as $comment)
        {
            $comments[] = new Comment(
                $comment['id'],
                $comment['article_id'],
                $comment['name'],
                $comment['content'],
                $comment['created_at'],
            );
        }

        return $comments;
    }
}