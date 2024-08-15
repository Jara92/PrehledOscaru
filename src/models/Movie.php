<?php

namespace Src\models;

/**
 * Movie model.
 */
class Movie
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}