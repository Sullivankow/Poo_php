<?php

namespace App\Controller;

class HomepageController
{
    public function index(): array
    {

        return [
            'page' => 'index',
            'title' => 'Homepage',
            'user' => []
        ];
    }
}