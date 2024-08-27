<?php

namespace Src\Models;

/**
 * Oscar model.
 */
class Oscar
{
    /**
     * Actor who won the Oscar.
     * @var Actor $actor
     */
    public Actor $actor;

    /**
     * Movie for which the Oscar was won.
     * @var Movie $movie
     */
    public Movie $movie;

    /**
     * Year in which the Oscar was won.
     * @var int $year
     */
    public int $year;

    public function __construct(Actor $actor, Movie $movie, int $year)
    {
        $this->actor = $actor;
        $this->movie = $movie;
        $this->year = $year;
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}