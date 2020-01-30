<?php

namespace App\Controller;

use App\Model\ViewPublic;
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
        $view = new ViewPublic('ListPosts');
        $view->generate($posts);

    }

    public function post($id)
    {
        $post = $this->postManager->getPost($id);
        $viewPost = new ViewPublic('Post');
        $comment = $this->commentManager->getComments($id);
        $viewComment = new ViewPublic('Comment');
        $viewPost->generate($post);
        $viewComment->generatecomment($comment);

    }
}
