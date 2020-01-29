<?php

namespace App\Controller;

use App\Model\View;
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
        $view->generate($posts);

    }

    public function post($id)
    {
        $post = $this->postManager->getPost($id);
        $viewPost = new View('Post');
        $comment = $this->commentManager->getComments($id);
        $viewComment = new View('Comment');
        $viewPost->generate($post);
        $viewComment->generatecomment($comment);

    }
}
