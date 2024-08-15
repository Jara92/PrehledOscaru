<?php

namespace Src\Controllers;

use Src\ActionResult;

/**
 * Application error controller.
 */
class ErrorController extends Controller
{
    public function notFound(): ActionResult
    {
        return new ActionResult('errors/404');
    }
}