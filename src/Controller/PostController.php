<?php

namespace App\Controller;

use App\Manager\PostManager;
use App\Manager\CommentManager;


Class PostController
{
    public $postManager;
    public $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
    }


    public function listPosts()
    {

        $posts = $this->postManager->getPosts();

        require('./../view/frontend/listPostsView.php');
    }

    public function post()
    {

        $post = $this->postManager->getPost($_GET['id']);
        $comments = $this->commentManager->getComments($_GET['id']);
        var_dump($comments);
        //var_dump($post);

        require('./../view/frontend/postView.php');
    }
}
