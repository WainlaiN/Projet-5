<?php

namespace App\Controller;


use App\Entity\View;
use App\Manager\PostManager;
use App\Manager\CommentManager;

class AdminController
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
        $view = new View('Admin');
        $view->generate($posts);

    }

    public function EditPosts($id)
    {
        $posts = $this->postManager->editPost($id);
        $view = new View('EditPost');
        $view->generate($posts);

    }

    public function DeletePost($id)
    {
        $post = $this->postManager->delete($id);


    }

    public function UpdatePost($id)
    {
        $post = $this->postManager->editPost($id);

    }

    public function DeleteComment($id)
    {
        $comment = $this->commentManager->deleteComment($id);


    }

    public function ValidateComment()
    {
        $comment = $this->commentManager->deleteComment($id);

    }

    public function getComments($id)
    {
        $comments = $this->commentManager->getComments($id);
        $view = new View('Comment');
        $view->generate($comments);

    }


}