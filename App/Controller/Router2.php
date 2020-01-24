<?php


namespace App\Controller;

use App\Entity\View;


class Router2
{

    private $postController;
    private $commentController;

    private $router;

    public function __construct()
    {
        $this->postController = new PostController();
        $this->commentController = new CommentController();
    }


    public function routerRequest($controller2, $method)
    {
        $controller2 = PostController::get();
        $method = call_user_func($method);
        $controller2->$method;
        dump($controller2, $method);



    }


    private function home()
    {
        $view = new View("Home");
        $view->Generate(array());
    }


}
