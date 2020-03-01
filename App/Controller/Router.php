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
            $c = new $cname;

            if ($params) {
                call_user_func_array(array($c, $method), array($params['id']));
            } else {
                call_user_func(array($c, $method));
            }
        } else {
            header('Location: /');
        }
    }
}
