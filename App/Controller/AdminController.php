<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Model\ViewAdmin;
use App\Manager\PostManager;
use App\Manager\CommentManager;


class AdminController
{
    public $postManager;
    public $commentManager;
    public $userManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->userManager = new UserManager();


        if (!isset($_SESSION['auth'])) {
            $_SESSION['flash']['danger'] = 'Vous n\'avez pas le droit d\'accéder à cette page';
            $this->login();
            die();

        }
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth']->getStatus() != 1) {
                $_SESSION['flash']['danger'] = 'Vous n\'avez pas le droit d\'accéder à cette page';
                header('Location: /admin');

            }
        }

    }

    public function listPosts()
    {
        $posts = $this->postManager->getPosts();
        $view = new ViewAdmin('Admin');
        $view->generate($posts);

    }

    public function editPost($id)
    {
        $posts = $this->postManager->editPost($id);
        $view = new ViewAdmin('EditPost');
        $view->generate($posts);

    }

    public function addPost()
    {

        if (!empty($_POST)) {
            $datas['author'] = $_POST['author'];
            $datas['title'] = $_POST['title'];
            $datas['chapo'] = $_POST['chapo'];
            $datas['description'] = $_POST['description'];

            $post = new Post($datas);
            $result = $this->postManager->addPost($post);
            if ($result) {
                header('Location: index.php?p=list');
            }
        }
        $this::listPosts();


    }

    public function addPostView()
    {
        $view = new ViewAdmin('AddPost');
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
        $view = new ViewAdmin('Comment');
        $view->generate($comments);

    }

    public function login()
    {
        $view = new ViewAdmin('Login');
        $view->generate(array());

    }


}