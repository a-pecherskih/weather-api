<?php

namespace Http;

use Helpers\RouteHelper;

/**
 * Class Request
 * @package Http
 */
class Request
{
    /**
     * @var array
     */
    private array $params;
    /**
     * @var string
     */
    private string $route;

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getParam(string $paramName, $default = null)
    {
        return $this->getParams()[$paramName] ?? $default;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->setRoute($params['route'] ?? '');
        unset($params['route']);

        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return RouteHelper::removeLastSlash($this->route);
    }

    /**
     * @param string|null $route
     */
    public function setRoute(?string $route): void
    {
        $this->route = empty($route) ? '/' : $route;
    }

    /**
     * @return array
     */
    public function getRouteParts(): array
    {
        $prepareRoute = $this->getRoute();
        return RouteHelper::devideRouteIntoParts($prepareRoute);
    }
}