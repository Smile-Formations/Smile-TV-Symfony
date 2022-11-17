<?php

namespace App\Controller;

use App\Event\UnderageMovieEvent;
use App\Repository\MovieRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Provider\MovieProvider;
use App\Security\Voter\MovieVoter;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

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
    public function movie_details(string $slug, MovieRepository $movieRepository, EventDispatcherInterface $dispatcher): Response
    {
        $movie = $movieRepository->findBySlug($slug);

        if (!$this->isGranted(MovieVoter::VIEW, $movie)) {
            $dispatcher->dispatch(new UnderageMovieEvent($movie), UnderageMovieEvent::NAME);

            $exception = $this->createAccessDeniedException('Access denied');
            $exception->setAttributes(MovieVoter::VIEW);
            $exception->setSubject($movie);

            throw $exception;
        }

        if ($movie === null) {
            throw $this->createNotFoundException('This movie does not exist...');
        }

        return $this->render('movie/movie.html.twig', [
            'movie' => $movie
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[Route('/omdb/{slug}', name: 'app_movie_details')]
    public function omdb(string $slug, MovieRepository $movieRepository, MovieProvider $movieProvider): Response
    {
        $movie = $movieProvider->getMovieByTitle(urldecode($slug));

        return $this->render('movie/movie.html.twig', [
            'movie' => $movie
        ]);
    }
}
