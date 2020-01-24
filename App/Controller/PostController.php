<?php

namespace App\Controller;

use App\Entity\View;
use App\Manager\PostManager;
use App\Manager\CommentManager;


Class PostController
{
    public $postManager;
    public $commentManager;
    public static $instance;

    public function __construct()
    {
        self::$instance = $this;
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
    }

    public static function get() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function listPosts()
    {

        $posts = $this->postManager->getPosts();
        $view = new View('ListPosts');
        $view->generate($posts);

    }

    public function post()
    {
        $post = $this->postManager->getPost($_GET['id']);
        $view = new View('Post');
        $view->generate($post);

    }
}
