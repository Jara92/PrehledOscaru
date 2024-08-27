<?php

namespace Src\Services;

use Src\Models\Actor;
use Src\Models\Movie;
use Src\Models\Oscar;

class OscarCsvParser
{
    public function parse($file, $gender) : array
    {
        $data = [];
        $handle = fopen($file, 'r');

        // Skip the first row
        fgetcsv($handle);

        while (($row = fgetcsv($handle)) !== false) {
            // Skip rows that don't have all the columns
            if(count($row) < 5){
                continue;
            }

            // Process csv row data
            $year = (is_numeric($row[1])) ? (int)$row[1] : 0;
            $age = (is_numeric($row[2])) ? (int)$row[2] : 0;
            $actorName = $row[3];
            $movieName = $row[4];

            // Create the models
            $actor = new Actor($actorName, $age, $gender);
            $movie = new Movie($movieName);
            $oscar = new Oscar($actor, $movie, $year);

            $data[] = $oscar;
        }
        fclose($handle);

        return $data;
    }
}