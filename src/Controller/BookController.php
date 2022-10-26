<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    private array $faker = [
        ['title' => 'Tintin au tibet', 'releasedAt' => '1997-09-22', 'genres' => ['Enfant', 'Aventures']],
        ['title' => 'Astérix le Gaulois', 'releasedAt' => '1997-09-22', 'genres' => ['Enfant', 'Aventures']],
        ['title' => 'Les Schtroumfs', 'releasedAt' => '1997-09-22', 'genres' => ['Enfant', 'Aventures']]
    ];

    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'books' => $this->faker
        ]);
    }

    #[Route('/book_details/{title}', name: 'app_book_details')]
    public function book_details(string $title): Response
    {
        $selected = [];
        foreach ($this->faker as $book) {
            if (str_replace(' ', '-', strtolower($book['title'])) === $title) {
                $selected = $book;
            }
        }

        if (empty($selected)) {
            throw $this->createNotFoundException('The book "' . $title . '" does not exist.');
        }

        return $this->render('book/book.html.twig', [
            'book' => $selected
        ]);
    }
}
