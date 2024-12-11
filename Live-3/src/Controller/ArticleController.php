<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

class ArticleController
{
    public function list()
    {
        $articleRepository = new ArticleRepository();

        return [
            'page' => 'articles/list',
            'articles' => $articleRepository->findAll(),
        ];
    }

    public function show(int $id)
    {
        $articleRepository = new ArticleRepository();

        return [
            'page' => 'articles/show',
            'article' => $articleRepository->find($id),
        ];
    }
}