<?php

use App\Controller\Router;
use App\Controller\Router2;

require '../vendor/autoload.php';

//$router = new Router();
//$router->routerRequest();


$routerAlto = new AltoRouter();


$routerAlto->map('GET', '/', 'postController@listPosts');


$routerAlto->map('GET', '/post-[i:id]/', 'postController@post');

$match = $routerAlto->match();


if (stripos($match['target'], '@') !== false) {
    list($controller, $method) = explode('@', $match['target'], 2);
} else {
    $controller = $match['target'];
    $method = 'index';
}

$router = new Router2();
$router->routerRequest($controller,$method);














