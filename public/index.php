<?php


use App\Controller\Router;

require '../vendor/autoload.php';

$router = new router();

//Front management
$router->map('GET', '/', '' );
$router->map('GET', '/posts', 'PostController#listPosts');
$router->map('GET', '/post/[i:id]', 'PostController#post');


//Admin Management
$router->map('GET', '/admin', 'AdminController#listPosts');
$router->map('GET', '/admin/post/[i:id]', 'AdminController#editPosts');
$router->map('GET', '/admin/delete/[i:id]', 'AdminController#deletePost');
$router->map('GET', '/admin/add', 'AdminController#addPostView');
$router->map('POST', '/admin/addPost', 'AdminController#addPost');
$router->map('GET', '/admin/comments/[i:id]', 'AdminController#getComments');
$router->map('GET', '/login', 'AdminController#login');


$match = $router->match();



$router->routerRequest($match['target'], $match['params']);

?>


















