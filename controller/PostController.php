<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;


require_once('./model/PostManager.php');

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

        require('view/frontend/listPostsView.php');
    }

    public function post()
    {

        $post = $this->postManager->getPost($_GET['id']);
        $comments = $this->commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }
}
