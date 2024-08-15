<?php

namespace Src\Controllers;

use Src\ActionResult;
use Src\services\OscarCsvParser;
use Src\services\OscarService;


/**
 * Controller for Oscar actions.
 */
class OscarController extends Controller
{
    private OscarCsvParser $csvParser;

    private OscarService $oscalService;

    public function __construct()
    {
        $this->csvParser = new OscarCsvParser();
        $this->oscalService = new OscarService();
    }

    /**
     * Display the index page of the Oscars.
     * @return ActionResult
     */
    public function index(): ActionResult
    {
        return new ActionResult('oscars/index');
    }

    /**
     * Parse the file and save the data.
     * @param string $file File input name
     * @return void
     */
    private function parseFile(string $file): void
    {
        // get the file name
        $tmpPath = $_FILES[$file]["tmp_name"];

        // figureout gender using file input name
        $gender = $file == "male";

        // Parse the CSV file
        $oscars = $this->csvParser->parse($tmpPath, $gender);

        // Save the data
        $this->oscalService->save($oscars);
    }

    /**
     * Handle the upload action.
     * @return ActionResult
     */
    public function upload(): ActionResult
    {
        // Http method must be post
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Must contain male and female uploads
            if(isset($_FILES["male"]) && isset($_FILES["female"])){
                // Process each gender
                $this->parseFile("male");
                $this->parseFile("female");

                // Process the data
                $byYear = $this->oscalService->getOscarsByYear();
                $moviesWhereBothGendersWon = $this->oscalService->getMovesWhereBothGendersWon();

                // Return action result with result data
                return new ActionResult('oscars/upload',
                    compact('byYear', 'moviesWhereBothGendersWon')
                );
            }
        }

        // Redirect to main page
        $this->redirect('/');
    }
}