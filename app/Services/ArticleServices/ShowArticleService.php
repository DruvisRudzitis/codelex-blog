<?php

namespace App\Services\ArticleServices;

use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;

class ShowArticleService
{
    private ArticleRepository $articleRepository;
    private CommentRepository $commentRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function execute(int $id): ShowArticleServiceResponse
    {
        $article = $this->articleRepository->getById($id);
        $comments = $this->commentRepository->getByArticleId($article->id());
        $tags = [];

        return new ShowArticleServiceResponse($article, $comments, $tags);
    }
}