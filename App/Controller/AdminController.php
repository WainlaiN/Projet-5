<?php

namespace App\Controller;

use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;

/**
 * Class AdminController controller for Backend
 */

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

    /**
     * Render the Posts view from the post manager
     */
    public function listPosts()
    {
        $list_posts = $this->_postManager->getPosts();
        $this->_renderer->render('Backend/adminView', ['listposts' => $list_posts]);
        //$_SESSION['flash'] = array();

    }

    /**
     * Render the Comments view from the comment manager
     *
     * @param $postId
     */
    public function listComments($postId)
    {
        $comments = $this->_commentManager->getComments($postId);
        $this->_renderer->render('Backend/commentsView', ['listcomments' => $comments]);
        //$_SESSION['flash'] = array();
    }

    /**
     * Render the Post View
     */
    public function addPostView()
    {
        $this->_renderer->render('Backend/addPostView');
        //$_SESSION['flash'] = array();

    }

    /**
     * Add a Post using post manager
     */
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

    /**
     * Delete a Post from ID using post manager
     *
     * @param $postId
     */
    public function deletePost($postId)
    {
        $request = $this->_postManager->deletePost($postId);
        if ($request === false) {
            $_SESSION['flash']['danger'] = 'Impossible de supprimer l\'article !';
        } else {
            $_SESSION['flash']['success'] = 'Votre article a été supprimé.';
        }
        header('Location: /admin');

    }

    /**
     * Delete a Comment from ID using comment manager
     *
     * @param $commentId
     */
    public function deletecomment($commentId)
    {
        $request = $this->_commentManager->deleteComment($commentId);
        if ($request === false) {
            $_SESSION['flash']['success'] = "Impossible de supprimer le commentaire";
        } else {
            $_SESSION['flash']['success'] = 'Votre commentaire a été supprimé.';
        }
        header('Location: /admin');
    }

    /**
     * Render Update Post View
     */
    public function updatePostView($postId)
    {
        $posts = $this->_postManager->getPost($postId);
        $this->_renderer->render('Backend/editPostView', ['listpost' => $posts]);


    }

    /**
     * Update a Post from ID using post manager
     */
    public function updatePost($postId)
    {
        $this->_postManager->updatePost($postId);
        $_SESSION['flash']['success'] = "Votre article a bien été modifié!";
        $this->updatePostView($postId);

    }

    /**
     * Validate a Comment from ID using comment manager
     */
    public function validateComment($commentId)
    {
        $request = $this->_commentManager->validateComment($commentId);
        if ($request === false) {
            $_SESSION['flash']['success'] = "Impossible de valider le commentaire";
        } else {
            $_SESSION['flash']['success'] = 'Le commentaire a été validé.';
        }
        header('Location: /admin');

    }


}