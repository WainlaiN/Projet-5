<?php

namespace App\Controller;

use App\Manager\LoginManager;
use App\Manager\UserManager;
use App\Model\ViewAdmin;
use App\Manager\PostManager;
use App\Manager\CommentManager;


class AdminController
{
    public $postManager;
    public $commentManager;
    public $loginManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->loginManager = new LoginManager();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['auth'])) {
            $_SESSION['flash']['danger'] = 'Connectez-vous pour accéder à cette page';
            header('Location: /login');


        }
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth']->getStatus() != 1) {
                $_SESSION['flash']['danger'] = 'Vous n\'avez pas le droit d\'accéder à cette page';
                header('Location: /Admin');

            }
        }

    }

    public function listPosts()
    {
        $posts = $this->postManager->getPosts();
        $view = new ViewAdmin('Admin');
        $view->generate($posts);

    }

    public function addPostView()
    {
        $view = new ViewAdmin('AddPost');
        $view->generate(array());
    }

    public function addPost()
    {

        if (!empty($_POST)) {
            $datas['author'] = $_POST['author'];
            $datas['title'] = $_POST['title'];
            $datas['chapo'] = $_POST['chapo'];
            $datas['description'] = $_POST['description'];

            //$post = new Post($datas);
            $result = $this->postManager->addPost($datas);

            if ($result) {
                header('Location: index.php?p=list');
            }
        }
        //$this::listPosts();
    }

    public function deletePost($id)
    {
        $this->postManager->deletePost($id);
        $this->listPosts();

    }

    public function updatePostView($id)
    {
        $posts = $this->postManager->getPost($id);
        $view = new ViewAdmin('EditPost');
        $view->generate($posts);
    }

    public function UpdatePost($id)
    {
        $this->postManager->updatePost($id);
        $this::updatePostView($id);
    }

    public function DeleteComment($id)
    {
        $this->commentManager->deleteComment($id);
    }

    public function ValidateComment()
    {
        $this->commentManager->validateComment($id);
    }

    public function getComments($id)
    {
        $comments = $this->commentManager->getComments($id);
        $view = new ViewAdmin('Comment');
        $view->generate($comments);
    }


}