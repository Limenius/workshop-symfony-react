<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use App\Model\MovieCollection;

class MovieController extends AbstractController
{
    /**
     * @Route("/", name="movies")
     */
    public function moviesAction(MovieCollection $movieCollection, SerializerInterface $serializer)
    {
        $movies = $movieCollection->findAll();

        return $this->render('movies/list.html.twig', [
            'props' => $serializer->normalize(['movies' => $movies]),
        ]);
    }

    /**
     * @Route("/movie/{slug}", name="movie")
     */
    public function movieAction(string $slug, MovieCollection $movieCollection, SerializerInterface $serializer)
    {
        $movie = $movieCollection->findOneBySlug($slug);

        return $this->render('movies/detail.html.twig', [
            'props' => $serializer->normalize(['movie' => $movie]),
        ]);
    }

}
