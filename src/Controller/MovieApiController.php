<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use App\Model\MovieCollection;

class MovieApiController
{
    /**
     * @Route("/api/movies", name="api_movies")
     *
     * Needed for client-side navigation after initial page load
     */
    public function apiMoviesAction(MovieCollection $movieCollection, SerializerInterface $serializer)
    {
        $movies = $movieCollection->findAll();

        return new JsonResponse($serializer->normalize($movies));
    }

    /**
     * @Route("/api/movies/{slug}", name="api_movie")
     *
     * Needed for client-side navigation after initial page load
     */
    public function apiMovieAction(string $slug, MovieCollection $movieCollection, SerializerInterface $serializer)
    {
        $movie = $movieCollection->findOneBySlug($slug);

        return new JsonResponse($serializer->normalize($movie));
    }

}
