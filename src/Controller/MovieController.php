<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie')]
    public function index(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findByMoreRecents();

        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
            'movies' => $movies
        ]);
    }

    #[Route('/movie_details/{slug}', name: 'app_movie_details')]
    public function movie_details(string $slug, MovieRepository $movieRepository): Response
    {
        $movie = $movieRepository->findOneBy(['slug' => $slug]);

        if ($movie === null) {
            throw $this->createNotFoundException('The movie "' . $slug . '" does not exist.');
        }

        return $this->render('movie/movie.html.twig', [
            'movie' => $movie
        ]);
    }
}
