<?php

namespace ModelsDTO;

/**
 * Class WeatherDTO
 */
class WeatherDTO
{
    /**
     * @var string
     */
    private string $date;
    /**
     * @var float
     */
    private float $temp;
    /**
     * @var string
     */
    private string $windDirection;

    /**
     * @var string
     */
    private string $lastUpdated;

    /**
     * @var string
     */
    private string $lat;
    /**
     * @var string
     */
    private string $long;

    /**
     * @var string
     */
    private string $country;

    /**
     * @var string
     */
    private string $region;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLong(): float
    {
        return $this->long;
    }

    /**
     * @param float $long
     */
    public function setLong(float $long): void
    {
        $this->long = $long;
    }

    /**
     * @return string
     */
    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    /**
     * @param string $lastUpdated
     */
    public function setLastUpdated(string $lastUpdated): void
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return float
     */
    public function getTemp(): float
    {
        return $this->temp;
    }

    /**
     * @param float $temp
     */
    public function setTemp(float $temp): void
    {
        $this->temp = $temp;
    }

    /**
     * @return string
     */
    public function getWindDirection(): string
    {
        return $this->windDirection;
    }

    /**
     * @param string $windDirection
     */
    public function setWindDirection(string $windDirection): void
    {
        $this->windDirection = $windDirection;
    }


}