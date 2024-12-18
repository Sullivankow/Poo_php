<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
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

    public function create(?array $postedData = null)
    {
        if ($postedData) {
            //from POST method
            $articleRepository = new ArticleRepository();

            if ($articleRepository->create($postedData['title'], $postedData['content'])) {
                $this->addFlash('success_message', 'Article créé');
            } else {
                $this->addFlash('error_message', 'Une erreur est survenue');
            }

            return $this->redirectToUri('/article/list');
        }

         return [
            'page' => 'articles/create',
        ];
    }
}