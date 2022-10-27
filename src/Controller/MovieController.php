<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Provider\MovieProvider;

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

    /**
     * @throws NonUniqueResultException
     */
    #[Route('/movie_details/{slug}', name: 'app_movie_details')]
    public function movie_details(string $slug, MovieRepository $movieRepository): Response
    {
        $movie = $movieRepository->findBySlug($slug);

        if ($movie === null) {
            throw $this->createNotFoundException('This movie does not exist...');
        }

        return $this->render('movie/movie.html.twig', [
            'movie' => $movie
        ]);
    }

    /*#[Route('/movie_details/{slug}', name: 'app_movie_details')]
    public function movie_details(string $slug, MovieRepository $movieRepository, MovieProvider $movieProvider): Response
    {
        $movie = $movieProvider->getMovieByTitle(urldecode($slug));

        return $this->render('movie/movie.html.twig', [
            'movie' => $movie
        ]);
    }*/
}
