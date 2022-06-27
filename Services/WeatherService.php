<?php

namespace Services;

use Contracts\Support\JsonFileKeeper;
use Contracts\Support\XmlFileKeeper;
use ModelsDTO\WeatherDTO;
use Services\Http\WeatherHttpService;

/**
 * Class WeatherService
 * @package Services
 */
class WeatherService
{
    /**
     * @var WeatherHttpService
     */
    private WeatherHttpService $weatherHttpService;
    /**
     * @var FileService
     */
    private FileService $keeperService;

    /**
     * WeatherService constructor.
     */
    public function __construct()
    {
        $this->weatherHttpService = new WeatherHttpService();
        $this->keeperService = new FileService();
    }


    /**
     * @param array $params
     * @return WeatherDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInfo(array $params): WeatherDTO
    {
        $weatherDTO = new WeatherDTO();
        $weatherDTO->setDate(date('Y-m-d H:i'));

        $coordinates = $this->getCoordinates($params['lat'] ?? null, $params['long'] ?? null);
        print_r($coordinates);
        $result = $this->weatherHttpService->getInfoByCoordinates($coordinates);

        $weatherDTO->setTemp($result['current']['temp_c']);
        $weatherDTO->setLastUpdated($result['current']['last_updated']);
        $weatherDTO->setWindDirection($result['current']['wind_dir']);
        $weatherDTO->setLat($result['location']['lat']);
        $weatherDTO->setLong($result['location']['lon']);
        $weatherDTO->setCountry($result['location']['country']);
        $weatherDTO->setRegion($result['location']['region']);

        return $weatherDTO;
    }

    /**
     * @param string $type
     * @param WeatherDTO $weatherDTO
     * @return bool
     */
    public function saveInfoToFile(string $type, WeatherDTO $weatherDTO): bool
    {
        if ($type == 'json') {
            $keeper = new JsonFileKeeper();
        } else if ($type == 'xml') {
            $keeper = new XmlFileKeeper();
        } else {
            return false;
        }

        $params = [
            'date' => $weatherDTO->getDate(),
            'temp' => $weatherDTO->getTemp(),
            'wind_direction' => $weatherDTO->getWindDirection(),
            'last_updated' => $weatherDTO->getLastUpdated(),
            'lat' => $weatherDTO->getLat(),
            'long' => $weatherDTO->getLong(),
            'county' => $weatherDTO->getCountry(),
            'region' => $weatherDTO->getRegion(),
        ];

        return $this->keeperService->saveToFile($keeper, 'weather', $params);
    }

    /**
     * @param $_lat
     * @param $_long
     * @return float[]|int[]
     */
    private function getCoordinates($_lat, $_long)
    {
        return [
            'lat' => (float)$_lat,
            'long' => (float)$_long,
        ];
    }
}