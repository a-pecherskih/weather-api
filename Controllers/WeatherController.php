<?php

namespace Controllers;

use Http\Request;
use Services\WeatherService;

/**
 * Class WeatherController
 * @package Controllers
 */
class WeatherController
{

    /**
     * @var WeatherService
     */
    private WeatherService $weatherService;

    /**
     * WeatherController constructor.
     */
    public function __construct()
    {
        $this->weatherService = new WeatherService();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function getWeatherInfo(Request $request)
    {
        $weatherDTO = $this->weatherService->getInfo($request->getParams());

        $isWritten = $this->weatherService->saveInfoToFile(
            (string)$request->getParam('type', 'json'),
            $weatherDTO
        );

        return $isWritten;
    }
}