<?php

namespace App\Controller;

use App\Manager\LoginManager;
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
        //$_SESSION['flash'] = array();

    }

    public function listComments($postId)
    {
        $comments = $this->commentManager->getComments($postId);
        $this->renderer->render('Backend/commentsView', ['listcomments' => $comments]);
        //$_SESSION['flash'] = array();
    }

    public function addPostView()
    {
        $this->renderer->render('Backend/addPostView');
        //$_SESSION['flash'] = array();

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
                header('Location: /admin');
            }
        }

    }

    public function deletePost($id)
    {
        $request = $this->postManager->deletePost($id);
        if ($request === false) {
            $_SESSION['flash']['danger'] = 'Impossible de supprimer l\'article !';
        } else {
            $_SESSION['flash']['success'] = 'Votre article a été supprimé.';
        }
        header('Location: /admin');

    }

    public function deletecomment($id)
    {
        $request = $this->commentManager->deleteComment($id);
        if ($request === false) {
            $_SESSION['flash']['success'] = "Impossible de supprimer le commentaire";
        } else {
            $_SESSION['flash']['success'] = 'Votre commentaire a été supprimé.';
        }
        header('Location: /admin');
    }

    public function updatePostView($id)
    {
        $posts = $this->postManager->getPost($id);
        $this->renderer->render('Backend/editPostView', ['listpost' => $posts]);


    }

    public function UpdatePost($id)
    {
        $this->postManager->updatePost($id);
        $_SESSION['flash']['success'] = "Votre article a bien été modifié!";
        $this->updatePostView($id);

    }

    public function ValidateComment($id)
    {
        $request = $this->commentManager->validateComment($id);
        if ($request === false) {
            $_SESSION['flash']['success'] = "Impossible de valider le commentaire";
        } else {
            $_SESSION['flash']['success'] = 'Le commentaire a été validé.';
        }
        header('Location: /admin');

    }


}