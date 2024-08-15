<?php

namespace Src;

use Src\Controllers\ErrorController;
use Src\Controllers\OscarController;

/**
 * Application router.
 */
class Router
{
    /**
     * Routes of the application where the key is the route and the value is the controller and action.
     * @var array|array[]
     */
    private array $routes = [
        '/' => [OscarController::class, 'index'],
        '/upload' => [OscarController::class, 'upload'],
    ];

    /**
     * Handle the request and return the result.
     * @param string $url
     * @return ActionResult
     */
    public function handle(string $url) : ActionResult
    {
        // Parse the URL
        $segments = parse_url($url);

        // Check if the route exists and call the action on the controller
        foreach ($this->routes as $route => $action) {
            if ($route === $segments['path']) {
                $controller = new $action[0];
                return $controller->{$action[1]}();
            }
        }

        return (new ErrorController())->notFound();
    }
}