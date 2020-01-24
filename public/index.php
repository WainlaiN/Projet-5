<?php

use App\Controller\Router;
use App\Controller\Router2;

require '../vendor/autoload.php';

//$router = new Router();
//$router->routerRequest();


$router = new router2();


$router->map('GET', '/', 'PostController#listPosts');
$router->map('GET', '/post/[i:id]', 'PostController#post');
$router->map('GET', '/admin', 'PostController#post');

$match = $router->match();
$router->routerRequest($match['target'], $match['params']);

?>


















