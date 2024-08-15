<?php

namespace Src\models;

/**
 * Actor model.
 */
class Actor
{
    private string $name;

    private int $age;

    private bool $isMale;

    public function __construct($name, $age, $isMale)
    {
        $this->name = $name;
        $this->age = $age;
        $this->isMale = $isMale;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function isMale(): bool
    {
        return $this->isMale;
    }
}