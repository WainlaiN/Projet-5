<?php


use App\Controller\Router;

require '../vendor/autoload.php';
$viewPath = '../view/';

$router = new router();

$router->map('GET', '/', '' );
$router->map('GET', '/posts', 'PostController#listPosts');
$router->map('GET', '/post/[i:id]', 'PostController#post');
$router->map('GET', '/admin', 'AdminController#listPosts');
$router->map('GET', '/admin/post/[i:id]', 'AdminController#editPosts');
$router->map('GET', '/admin/post/[i:id]/delete', 'AdminController#delete');
$router->map('GET', '/admin/add', 'AdminController#addPost');
$router->map('GET', '/admin/comments/[i:id]', 'AdminController#getComments');

$match = $router->match();


$router->routerRequest($match['target'], $match['params']);

?>


















