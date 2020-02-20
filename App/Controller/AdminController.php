<?php

namespace App\Controller;

use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;


class AdminController
{
    private $_postManager;
    private $_commentManager;
    private $_loginManager;
    private $_renderer;

    public function __construct()
    {
        $this->_postManager = new PostManager();
        $this->_commentManager = New CommentManager();
        $this->_loginManager = new LoginManager();
        $this->_renderer = new TwigRenderer();

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
        $list_posts = $this->_postManager->getPosts();
        $this->_renderer->render('Backend/adminView', ['listposts' => $list_posts]);
        //$_SESSION['flash'] = array();

    }

    public function listComments($postId)
    {
        $comments = $this->_commentManager->getComments($postId);
        $this->_renderer->render('Backend/commentsView', ['listcomments' => $comments]);
        //$_SESSION['flash'] = array();
    }

    public function addPostView()
    {
        $this->_renderer->render('Backend/addPostView');
        //$_SESSION['flash'] = array();

    }

    public function addPost()
    {

        if (!empty($_POST)) {
            $datas['author'] = $_POST['author'];
            $datas['title'] = $_POST['title'];
            $datas['chapo'] = $_POST['chapo'];
            $datas['description'] = $_POST['description'];

            $result = $this->_postManager->addPost($datas);

            if ($result) {
                header('Location: /admin');
            }
        }

    }

    public function deletePost($id)
    {
        $request = $this->_postManager->deletePost($id);
        if ($request === false) {
            $_SESSION['flash']['danger'] = 'Impossible de supprimer l\'article !';
        } else {
            $_SESSION['flash']['success'] = 'Votre article a été supprimé.';
        }
        header('Location: /admin');

    }

    public function deletecomment($id)
    {
        $this->_commentManager->deleteComment($id);
        $_SESSION['flash']['success'] = "Votre commentaire a bien été supprimé!";
        header('Location: /admin');
    }

    public function updatePostView($id)
    {
        $posts = $this->_postManager->getPost($id);
        $this->_renderer->render('Backend/editPostView',  ['listpost' => $posts]);
        //$_SESSION['flash'] = array();

    }

    public function UpdatePost($id)
    {
        $this->_postManager->updatePost($id);
        $_SESSION['flash']['success'] = "Votre article a bien été modifié!";
        $this->updatePostView($id);

    }

    public function ValidateComment()
    {
        $this->_commentManager->validateComment($id);
    }


}