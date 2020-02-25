<?php


use App\Controller\Router;

require '../vendor/autoload.php';

$router = new router();




try {

    //Front management
    $router->map('GET', '/', 'FrontController#home');
    //$router->map('GET', '/home', '');
    $router->map('GET', '/posts', 'FrontController#listPosts');
    $router->map('GET', '/post/[i:id]', 'FrontController#post');
    $router->map('GET', '/register', 'FrontController#registerView');
    $router->map('POST', '/register', 'FrontController#register');
    $router->map('POST', '/comment/add', 'FrontController#addComment');
    $router->map('POST', '/', 'FrontController#contactForm');
    $router->map('GET', '/CV', 'FrontController#cvNico');

    //Admin Management
    $router->map('GET', '/admin', 'AdminController#listPosts');
    $router->map('GET', '/admin/post/[i:id]', 'AdminController#updatePostView');
    $router->map('POST', '/admin/post/[i:id]', 'AdminController#UpdatePost');
    $router->map('GET', '/admin/post/delete/[i:id]', 'AdminController#deletePost');
    $router->map('GET', '/admin/add', 'AdminController#addPostView');
    $router->map('POST', '/admin/addpost', 'AdminController#addPost');
    $router->map('GET', '/admin/comments/[i:id]', 'AdminController#listComments');
    $router->map('GET', '/admin/comment/delete/[i:id]', 'AdminController#deleteComment');
    $router->map('GET', '/admin/comment/validate/[i:id]', 'AdminController#validateComment');

    //login Management
    $router->map('GET', '/login', 'FrontController#login');
    $router->map('POST', '/connect', 'FrontController#connect');
    $router->map('GET', '/logout', 'FrontController#deconnect');

    $match = $router->match();

    $router->routerRequest($match['target'], $match['params']);

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    $_SESSION['errorMessage'] = $errorMessage;
    dump($errorMessage, $_SESSION);
    header('HTTP/1.1 404 Not Found');
    header('Location: /404');
}

?>


















