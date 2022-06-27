<?php

namespace Http;

/**
 * Class HttpError
 * @package Http
 */
class HttpError {

    /**
     * Redirect 404
     */
    public function error404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}