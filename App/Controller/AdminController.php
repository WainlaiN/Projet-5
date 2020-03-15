<?php

namespace App\Controller;

use App\Core\Controller;
use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\FormValidator;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class AdminController controller for Backend
 */
class AdminController extends Controller
{
    private $postManager;
    private $commentManager;
    private $loginManager;
    private $request;


    public function __construct()
    {
        parent::__construct();
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->loginManager = new LoginManager();


        if (!$this->session->get('auth')) {
            $this->session->set('warning', "Connectez-vous pour accéder à cette page");
            header('Location: /login');
        }

        if ($this->session->get('auth')) {
            if ($this->session->get('auth')->getUserstatus() != 1) {
                $this->session->set('warning', "Vous n'avez pas le droit d'accéder à cette page");
                header('Location: /Admin');
            }
        }
    }


    /**
     * Render the Posts view from the post manager
     */
    public function listPosts()
    {
        $list_posts = $this->postManager->getPosts();
        $this->renderer->render('Backend/adminView', ['listposts' => $list_posts]);
    }

    /**
     * Render the Comments view from the comment manager
     *
     * @param $postId
     */
    public function listComments($postId)
    {
        $comments = $this->commentManager->getComments($postId);
        $this->renderer->render('Backend/commentsView', ['listcomments' => $comments]);
    }

    /**
     * Render the Post View
     */
    public function addPostView()
    {
        $this->renderer->render('Backend/addPostView');
    }

    /**
     * Add a Post using post manager
     */
    public function addPost()
    {
        $request = Request::createFromGlobals();

        if ($request->get('formtoken') == $this->session->get('token')) {

            if (!empty($request->request->all())) {
                $datas['author_id'] = FormValidator::purify($request->get('author_id'));
                $datas['author'] = FormValidator::purify($request->get('author'));
                $datas['title'] = FormValidator::purify($request->get('title'));
                $datas['chapo'] = FormValidator::purify($request->get('chapo'));
                $datas['description'] = FormValidator::purifyContent($request->get('description'));

                $result = $this->postManager->addPost($datas);

                if ($result === false) {
                    $this->session->set('warning', "Impossible d'ajouter l'article !");
                } else {
                    $this->session->set('success', "Votre article a été ajouté.");
                }
                header('Location: /admin');
            }
        } else {
            $this->session->set('warning', "Problème de token, veuillez vous reconnecter");
            header('Location: /logout');
        }
    }


    /**
     * Delete a Post from ID using post manager
     *
     * @param $postId
     */
    public function deletePost($postId)
    {
        if ($request->get('formtoken') == $this->session->get('token')) {

            $request = $this->postManager->deletePost($postId);
            if ($request === false) {
                $this->session->set('warning', "Impossible de supprimer l'article !");
            } else {
                $this->session->set('success', "Votre article a été supprimé.");
            }
            header('Location: /admin');
        } else {
            $this->session->set('warning', "Problème de token, veuillez vous reconnecter");
            header('Location: /logout');
        }
    }

    /**
     * Delete a Comment from ID using comment manager
     *
     * @param $commentId
     */
    public function deletecomment($commentId)
    {
        $request = $this->commentManager->deleteComment($commentId);
        if ($request === false) {
            $this->session->set('warning', "Impossible de supprimer le commentaire !");
        } else {
            $this->session->set('success', "Votre commentaire a été supprimé.");
        }
        header('Location: /admin');
    }

    /**
     * Render Update Post View
     */
    public function updatePostView($postId)
    {
        $post = $this->postManager->getPost($postId);
        $this->renderer->render('Backend/editPostView', ['listpost' => $post]);
    }

    /**
     * Update a Post from ID using post manager
     */
    public function updatePost($postId)
    {
        $request = Request::createFromGlobals();


        if ($request->get('formtoken') == $this->session->get('token')) {

            if (!empty($request->request->all())) {
                $datas['authorid'] = FormValidator::purify($request->get('authorid'));
                $datas['title'] = FormValidator::purify($request->get('title'));
                $datas['chapo'] = FormValidator::purify($request->get('chapo'));
                $datas['description'] = FormValidator::purifyContent($request->get('description'));

                $result = $this->postManager->updatePost($postId, $datas);

                if ($result === false) {
                    $this->session->set('warning', "Impossible de modifier l'article !");
                } else {
                    $this->session->set('success', "Votre article a bien été modifié.");
                }
                $this->updatePostView($postId);
            }
        } else {
            $this->session->set('warning', "Problème de token, veuillez vous reconnecter");
            header('Location: /logout');
        }
    }

    /**
     * Validate a Comment from ID using comment manager
     */
    public function validateComment($commentId)
    {
        $request = $this->commentManager->validateComment($commentId);
        if ($request === false) {
            $this->session->set('warning', "Impossible de valider le commentaire !");
        } else {
            $this->session->set('success', "Le commentaire a été validé.");
        }
        header('Location: /admin');
    }

}