<?php


use App\Controller\Router;

require 'vendor/autoload.php';

$router = new router();
$router->setBasePath('Projet5/');

    //Front management
    $router->map('GET', 'Projet5/', 'FrontController#home');
    $router->map('GET', 'Projet5/posts', 'FrontController#listPosts');
    $router->map('GET', 'Projet5/post/[i:id]', 'FrontController#post');
    $router->map('GET', 'Projet5/register', 'FrontController#registerView');
    $router->map('POST', 'Projet5/register', 'FrontController#register');
    $router->map('POST', 'Projet5/comment/add', 'FrontController#addComment');
    $router->map('POST', 'Projet5/', 'FrontController#contactForm');
    $router->map('GET', 'Projet5/CV', 'FrontController#cvNico');
    $router->map('GET', 'Projet5/CGV', 'FrontController#getCGV');

    //Admin Management

    $router->map('GET', 'Projet5/admin', 'AdminController#listPosts');
    $router->map('GET', 'Projet5/admin/post/[i:id]', 'AdminController#updatePostView');
    $router->map('POST', 'Projet5/admin/post/[i:id]', 'AdminController#UpdatePost');
    $router->map('POST', 'Projet5/admin/post/delete/[i:id]', 'AdminController#deletePost');
    $router->map('GET', 'Projet5/admin/add', 'AdminController#addPostView');
    $router->map('POST', 'Projet5/admin/addpost', 'AdminController#addPost');
    $router->map('GET', 'Projet5/admin/comments/[i:id]', 'AdminController#listComments');
    $router->map('POST', 'Projet5/admin/comment/delete/[i:id]', 'AdminController#deleteComment');
    $router->map('POST', 'Projet5/admin/comment/validate/[i:id]', 'AdminController#validateComment');

    //login Management
    $router->map('GET', 'Projet5/login', 'FrontController#login');
    $router->map('POST', 'Projet5/connect', 'FrontController#connect');
    $router->map('GET', 'Projet5/logout', 'FrontController#deconnect');

    $match = $router->match();


    $router->routerRequest($match['target'], $match['params']);



?>


















