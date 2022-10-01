<?php
namespace Dash\Http;

class Route
{
    /**
     * static array to push route components
     *
     * @var array
     */
    protected static array $routes = [];

    /**
     * Method for get requests to handle a route with an action
     *
     * @param string $route
     * @param callback $action
     * @return void
     */
    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }

    /**
     * Method for post requests to handle a route with an action
     *
     * @param string $route
     * @param callback $action
     * @return void
     */
    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }
}