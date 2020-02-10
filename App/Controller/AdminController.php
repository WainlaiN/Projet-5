<?php

namespace App\Controller;

use App\Manager\LoginManager;
use App\Model\User;
use App\Model\ViewAdmin;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;


class AdminController
{
    private $postManager;
    private $commentManager;
    private $loginManager;
    private $renderer;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->loginManager = new LoginManager();
        $this->renderer = new TwigRenderer();

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
        $list_posts = $this->postManager->getPosts();
        $this->renderer->render('Backend/adminView', ['listposts' => $list_posts]);
        $_SESSION['flash'] = array();

    }

    public function listComments($postId)
    {
        $comments = $this->commentManager->getComments($postId);
        $this->renderer->render('Backend/commentsView', ['listcomments' => $comments]);
        $_SESSION['flash'] = array();
    }

    public function addPostView()
    {
        $this->renderer->render('Backend/addPostView');
        $_SESSION['flash'] = array();

    }

    public function addPost()
    {

        if (!empty($_POST)) {
            $datas['author'] = $_POST['author'];
            $datas['title'] = $_POST['title'];
            $datas['chapo'] = $_POST['chapo'];
            $datas['description'] = $_POST['description'];

            $result = $this->postManager->addPost($datas);

            if ($result) {
                $this->listPosts();
            }
        }

    }

    public function deletePost($id)
    {
        $this->postManager->deletePost($id);

    }

    public function deletecomment($id)
    {
        $this->commentManager->deleteComment($id);
        $this->listPosts();
    }

    public function updatePostView($id)
    {
        $posts = $this->postManager->getPost($id);
        $this->renderer->render('Backend/editPostView',  ['listpost' => $posts]);
        $_SESSION['flash'] = array();

    }

    public function UpdatePost($id)
    {
        $this->postManager->updatePost($id);
        $this->updatePostView($id);

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