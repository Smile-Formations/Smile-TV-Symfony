<?php

namespace App\Provider;

use App\Consumer\OMDbApiConsumer;
use App\Entity\Movie;
use App\Entity\User;
use App\Repository\MovieRepository;
use App\Repository\UserRepository;
use App\Transformer\OmdbMovieTransformer;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\Security\Core\Security;

class MovieProvider
{
    public function __construct(
        private MovieRepository $movieRepository,
        private UserRepository $userRepository,
        private OMDbApiConsumer $consumer,
        private OmdbMovieTransformer $transformer,
        private Security $security
    ) {}

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getMovieByTitle(string $title, bool $fromCommand = false): Movie
    {
        return $this->getOneMovie(OMDbApiConsumer::MODE_TITLE, $title, $fromCommand);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getMovieById(string $id, bool $fromCommand = false): Movie
    {
        return $this->getOneMovie(OMDbApiConsumer::MODE_ID, $id, $fromCommand);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    private function getOneMovie(string $mode, string $value, bool $fromCommand): Movie
    {
        if (false === $fromCommand && !$this->security->isGranted('ROLE_USER')) {
            throw new UnauthorizedHttpException('You must be logged in to add a movie.');
        }

        $movie = $this->transformer->transform(
            $this->consumer->consume($mode,  $value)
        );

        if ($entity = $this->movieRepository->findOneBy(['title' => $movie->getTitle()])) {
            return $entity;
        }

        if (false === $fromCommand) {

            $user = $this->security->getUser();
            assert($user instanceof User);
            $movie->setAddedBy($user);

        } else {

            $users = $this->userRepository->findAdmins();
            if (empty($users)) {
                throw new UserNotFoundException('No admin user has been registered.');
            }
            $movie->setAddedBy($users[0]);
        }

        $this->movieRepository->save($movie, true);

        return $movie;
    }
}
