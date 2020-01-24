<?php


namespace App\Controller;

use App\Entity\View;
use App\Controller\PostController;
use App\Controller\CommentController;


class Router2 extends \AltoRouter
{

    private $postController;
    private $commentController;
    public $params = [];


    public function routerRequest($target, $params)
    {

        if (stripos($target, '#') !== false) {
            list($controller, $method) = explode('#', $target, 2);
            $cname = "\App\Controller\\" . $controller;
            $c = new $cname;
            dump($controller, $method);

            if ($params) {
                $this->params = $params;

                call_user_func_array(array($c, $method), array($params['id']));
            } else {
                call_user_func(array($c, $method));
            }
        }
    }


private
function home()
{
    $view = new View("Home");
    $view->Generate(array());
}


}
