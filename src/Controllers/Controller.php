<?php

namespace Src\Controllers;

/**
 * Base application controller.
 */
abstract class Controller
{
    public function redirect($path): never
    {
        header("Location: $path");
        exit;
    }
}