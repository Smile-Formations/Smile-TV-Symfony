<?php

namespace App\Controller;

use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findByMoreRecents();
        $form = $this->createForm(BookType::class);

        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'books' => $books,
            'book_form' => $form->createView()
        ]);
    }

    /**
     * @throws NonUniqueResultException
     */
    #[Route('/book_details/{slug}', name: 'app_book_details')]
    public function book_details(string $slug, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->findBySlug($slug);

        if ($book === null) {
            throw $this->createNotFoundException('The book "' . $slug . '" does not exist.');
        }

        return $this->render('book/book.html.twig', [
            'book' => $book
        ]);
    }
}
