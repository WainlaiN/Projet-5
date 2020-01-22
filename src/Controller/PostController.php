<?php

namespace App\Controller;

use App\Entity\View;
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
        $view = new View('ListPosts');
        $view ->generate($posts);

    }

    public function post()
    {
        $post = $this->postManager->getPost($_GET['id']);
        $comments = $this->commentManager->getComments($_GET['id']);
        $view = new View('Post');
        $viewComments = new View('Comment');

        //generate data for post
        $view ->generate($post);
        //generate data for comments
        $viewComments ->generate($comments);

    }
}
