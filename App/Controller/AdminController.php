<?php

namespace App\Controller;


use App\Entity\Post;
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

    public function editPosts($id)
    {
        $posts = $this->postManager->editPost($id);
        $view = new View('EditPost');
        $view->generate($posts);

    }

    public function addPost()
    {

        if (!empty($_POST))
        {
            $datas['author'] = $_POST['author'];
            $datas['title'] = $_POST['title'];
            $datas['chapo'] = $_POST['chapo'];
            $datas['description'] = $_POST['description'];

            $post = new Post($datas);
            $result = $this->postManager->addPost($post);
            if($result)
            {
                header('Location: index.php?p=list');
            }
        }

        //$view = new View("Add");
        //$view->generate(array());

    }

    public function addPostView()
    {
        $view = new View('addPost');
        $view->generate(array());
    }

    public function deletePost($id)
    {
        $this->postManager->delete($id);


    }

    public function UpdatePost($id)
    {
        $this->postManager->editPost($id);

    }

    public function DeleteComment($id)
    {
        $this->commentManager->deleteComment($id);


    }

    public function ValidateComment()
    {
        $this->commentManager->deleteComment($id);

    }

    public function getComments($id)
    {
        $comments = $this->commentManager->getComments($id);
        $view = new View('Comment');
        $view->generate($comments);

    }


}