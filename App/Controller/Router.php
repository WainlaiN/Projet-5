<?php


namespace App\Controller;

use AltoRouter;

/**
 * class Router controller for router
 */
class Router extends AltoRouter
{
    public function routerRequest($target, $params)
    {

        if (stripos($target, '#') !== false) {
            list($controller, $method) = explode('#', $target, 2);
            $cname = "\App\Controller\\" . $controller;
            $controllerName = new $cname;

            if ($params) {
                call_user_func_array(array($controllerName, $method), array($params['id']));
            } else {
                call_user_func(array($controllerName, $method));
            }
        } else {
            header('Location: /');
        }
    }
}
