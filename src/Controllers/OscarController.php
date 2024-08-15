<?php

namespace Src\Controllers;

use Src\ActionResult;

/**
 * Controller for Oscar actions.
 */
class OscarController extends Controller
{
    /**
     * Display the index page of the Oscars.
     * @return ActionResult
     */
    public function index(): ActionResult
    {
        return new ActionResult('oscars/index');
    }
}