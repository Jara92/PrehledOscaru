<?php

require '../vendor/autoload.php';
require '../src/ViewFunctions.php';

use Src\Router;

$router = new Router;
$result = $router->handle($_SERVER['REQUEST_URI']);

require "../src/views/layouts/base.phtml";