<?php
namespace App\Model;

use Symfony\Component\Yaml\Parser;

class MovieCollection
{
    public $movies = [];

    public function __construct()
    {
        $yaml = new Parser();
        $moviesData = $yaml->parse(file_get_contents(__DIR__.'/../DataFixtures/movies.yml'))['movies'];
        $movies = array();
        foreach($moviesData as $movieData) {
            $movie = new Movie();
            $movie->name = $movieData['name'];
            $movie->slug = $movieData['slug'];
            $movie->image = $movieData['image'];
            $this->movies[] = $movie;
        }
    }

    public function findAll()
    {
        return $this->movies;
    }

    public function findOneBySlug($slug)
    {
        foreach ($this->movies as $movie) {
            if ($movie->slug === $slug) {
                return $movie;
            }
        }
        return null;
    }
}