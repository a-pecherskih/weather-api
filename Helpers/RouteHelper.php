<?php

namespace Helpers;

/**
 * Class RouteHelper
 * @package Helpers
 */
class RouteHelper
{

    /**
     * Удаление последнего слеша
     *
     * @param string $route
     * @return string
     */
    public static function removeLastSlash(string $route)
    {
        if ($route != '/' && $route[strlen($route) - 1] == '/') {
            return mb_substr($route, 0, -1);
        }

        return $route;
    }

    /**
     * Деление uri на части по разделителю /
     *
     * @param string $route
     * @return array|string[]
     */
    public static function devideRouteIntoParts(string $route)
    {
        return $route != '/' ? explode('/', trim($route, '/')) : (array)$route;
    }

}