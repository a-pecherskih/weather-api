<?php

require 'vendor/autoload.php';
require_once('config/config.php');
require_once('Http/Router.php');

spl_autoload_register(function ($className) {
    include $className . '.php';
});


use Http\Request;
use App\Router;

$router = new Router();
$request = new Request();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
    {
        $request->setParams($_GET);
        return $router->get($request);
    }
    case 'POST':
    {
        $request->setParams($_POST);
        return $router->post($request);
    }
}

