<?php

namespace Services\Http;

use GuzzleHttp\Client;
use Helpers\RouteHelper;

/**
 * Class HttpService
 * @package Services\Http
 */
abstract class HttpService
{
    /**
     * @var Client
     */
    protected Client $httpClient;
    /**
     * @var string
     */
    protected string $baseUrl;

    /**
     * HttpService constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
        $this->initBaseUrl();
    }

    /**
     * @return mixed
     */
    abstract function initBaseUrl();

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param string $uri
     * @param array $params
     * @return string
     */
    private function getFullUrl(string $uri, array $params = [])
    {
        $fullUrl = RouteHelper::removeLastSlash($this->getBaseUrl() . '/' . $uri);

        if (!empty($params)) {
            $fullUrl = $this->addQueryToUrl($fullUrl, $params);
        }

        return $fullUrl;
    }

    /**
     * @param string $fullUrl
     * @param array $params
     * @return string
     */
    private function addQueryToUrl(string $fullUrl, array $params)
    {
        $query = [];

        foreach ($params as $key => $value) {
            $query[] = $key . '=' . $value;
        }

        return $fullUrl . '?' . implode('&', $query);
    }

    /**
     * @param string $uri
     * @param array $params
     * @param array $headers
     * @return array|mixed|\Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $params = [], array $headers = [])
    {
        $response = $this->httpClient->get($this->getFullUrl($uri, $params));

        if ($response->getStatusCode() == 200) {
            if ($response->getHeader('Content-Type')[0] == 'application/json') {
                return json_decode($response->getBody(), true);
            }

            return $response->getBody();
        }

        return [];
    }

    /**
     *
     */
    public function post()
    {
        //
    }

}