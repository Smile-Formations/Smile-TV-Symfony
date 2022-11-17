<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    public function latestMovies(MovieRepository $movieRepository, int $max): Response
    {
        $movies = $movieRepository->findLatest($max);
        return $this->render('home/movies.html.twig', [
            'movies' => $movies,
        ]);
    }

    public function latestBooks(BookRepository $bookRepository, int $max): Response
    {
        $books = $bookRepository->findLatest($max);
        return $this->render('home/books.html.twig', [
            'books' => $books,
        ]);
    }
}
