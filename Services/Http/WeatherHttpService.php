<?php

namespace Services\Http;

/**
 * Class WeatherHttpService
 * @package Services\Http
 */
class WeatherHttpService extends HttpService
{
    /**
     * @return mixed|void
     */
    function initBaseUrl()
    {
        $this->setBaseUrl(WEATHER_API_URL);
    }

    /**
     * @param array $coordinates
     * @return array|mixed|\Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInfoByCoordinates(array $coordinates)
    {
        $params = [
            'key' => WEATHER_API_KEY,
            'q' => $coordinates['lat'] . ',' . $coordinates['long']
        ];

        return $this->get('', $params);
    }
}