<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;


    public function __construct(string $title,string $studio,string $rating){
        $this->title=$title;
        $this->studio=$studio;
        $this->rating=$rating;

    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getRating(): string
    {
        return $this->rating;
    }
}

class Store
{

    public function getPg(array $movies):array{
        $pgMovies = [];
        foreach ($movies as $movie) {
           if($movie->getRating()==='PG'){
                $pgMovies[]= $movie;

           }
        }return $pgMovies;

    }
}
$movies =[
$movie1 = new Movie('Casino Royale','Eon Productions','PG13'),
$movie2 = new Movie('Glass','Buena Vista International','PG'),
$movie3 = new Movie('Spider-Man: Into the Spider-Verse','“Columbia Pictures','PG'),
];


$store = new Store;
var_dump($store->getPg($movies));