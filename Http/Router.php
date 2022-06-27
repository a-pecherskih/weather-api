<?php

namespace App;

use Controllers\WeatherController;
use Http\HttpError;
use Http\Request;

/**
 * Class Router
 * @package App
 */
class Router
{

    /**
     * @var HttpError
     */
    private HttpError $httpError;
    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->httpError = new HttpError();
    }

    /**
     * @param Request $request
     */
    public function get(Request $request)
    {
        $parts = $request->getRouteParts();

        switch ($parts[0]) {
            case 'info':
                if (count($parts) > 1) break; //обработка параметров и тп пропускаем

                $controller = new WeatherController();
                return $controller->getWeatherInfo($request);
            case '/':
                echo 'main page. Use /info';
                break;
            default:
                $this->errorNotFound();
        }
    }


    /**
     * @param Request $request
     * @return bool
     */
    public function post(Request $request)
    {
        return true;
    }

    /**
     * redirect 404
     */
    function errorNotFound()
    {
        $this->httpError->error404();
    }
}