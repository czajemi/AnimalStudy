<?php

require_once __DIR__.'/controllers/SecurityController.php';
require_once __DIR__.'/controllers/AllergiesController.php';
require_once __DIR__.'/controllers/VaccinationsController.php';
require_once __DIR__.'/controllers/DewormingsController.php';
require_once __DIR__.'/controllers/EditController.php';
require_once __DIR__.'/controllers/RegisterController.php';

class Router {

    public static $routes;

    public static function get($url, $view)
    {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view)
    {
        self::$routes[$url] = $view;
    }

    static public function run(string $path) {
       

        $urlParts = explode("/", $path);
        $action = $urlParts[0];

        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';
        $id = $urlParts[1] ?? '';

        $object->$action($id);
    }
}