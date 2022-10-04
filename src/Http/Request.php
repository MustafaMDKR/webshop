<?php
namespace Dash\Http;

class Request
{

    /**
     * Check the method type of the request
     *
     * @return void
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    /**
     * A method to retrieve the path of the request
     *
     * @return void
     */
    public function path()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        return str_contains($path, "?") ? explode('?', $path)[0] : $path;
    }
}