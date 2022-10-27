<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fruit', name: 'app_fruit')]
class GetFruitController
{
    public function __invoke(): Response
    {
        return new Response('Yay fruit');
    }
}