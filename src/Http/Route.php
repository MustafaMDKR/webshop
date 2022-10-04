<?php
namespace Dash\Http;

use Dash\View\View;

class Route
{
    /**
     * static array to push route components
     *
     * @var array
     */
    protected static array $routes = [];

    /**
     * Undocumented variable
     *
     * @var Request
     */
    protected Request $request;

    /**
     * Undocumented variable
     *
     * @var Response
     */
    protected Response $response;

    /**
     * Main constructor class
     *
     * @param Request  $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

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

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;

        if (!array_key_exists($path, self::$routes[$method])) {
            View::makeError('404');
        }

        if (!$action) {
            return;
        }

        // 404 Handling

        if(is_callable($action)) {
            call_user_func_array($action, []);
        }

        if (is_array($action)) {
            call_user_func_array([new $action[0], $action[1]], []);
        }
    }


}