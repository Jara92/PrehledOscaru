<?php

namespace Src\Services;

use Src\Models\Oscar;
use Src\OscarIndex;

class OscarService
{
    private array $oscars = [];

    /**
     * @param Oscar[] $oscars
     * @return void
     */
    public function save(array $oscars): void
    {
        foreach ($oscars as $oscar) {
            $this->saveOscar($oscar->getYear(), $oscar);
        }
    }

    private function saveOscar($key, Oscar $oscar): void
    {
        if (!isset($this->oscars[$key])) {
            $this->oscars[$key] = new OscarIndex();
        }

        // Set actor by his gender
        if($oscar->getActor()->isMale()){
            $this->oscars[$key]->male = $oscar;
        }
        else{
            $this->oscars[$key]->female = $oscar;
        }
    }

    public function getOscarsByYear(): array
    {
        // Sort by year
        ksort($this->oscars);

        return $this->oscars;
    }

    public function getMovesWhereBothGendersWon(): array
    {
        // get only the movies where both male and female won
        $result = array_filter($this->getOscarsByYear(), function($oscarIndex){
            return $oscarIndex->male->getMovie()->getName() === $oscarIndex->female->getMovie()->getName();
        });

        // Sort by movie name
        uasort($result, function ($a, $b) {
            return $a->male->getMovie()->getName() <=> $b->male->getMovie()->getName();
        });

        return $result;
    }
}