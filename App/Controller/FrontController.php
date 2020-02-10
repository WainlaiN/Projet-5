<?php

namespace App\Controller;

use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;


Class FrontController
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
    }

    public function home()
    {
        $this->renderer->render('Frontend/homeView');
        $_SESSION['flash'] = array();
    }

    public function listPosts()
    {
        $list_posts = $this->postManager->getPosts();
        $this->renderer->render('Frontend/listPostView', ['listposts' => $list_posts]);
        $_SESSION['flash'] = array();
    }

    public function post($id)
    {
        $post = $this->postManager->getPost($id);
        $list_comments = $this->commentManager->getValidComments($id);
        $this->renderer->render('Frontend/postView', ['post' => $post, 'listcomments' => $list_comments]);
        $_SESSION['flash'] = array();
    }

    public function addComment($postId)
    {
        $comment = $this->commentManager->addComment($postId, $author, $comment);

    }

    public function login()
    {
        $this->renderer->render('Frontend/loginView');
        $_SESSION['flash'] = array();
    }

    public function registerView()
    {
        $this->renderer->render('Frontend/registeView');
        $_SESSION['flash'] = array();

    }

    public function connect()
    {

        if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
            $_SESSION['flash']['danger'] = 'Votre pseudo ' . $_POST['username'] . 'n\est pas valide';
            header('location: /login');

        } elseif (empty($_POST['password']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])) {
            $_SESSION['flash']['danger'] = "Votre mot de passe n'est pas valide";
            header('location: /login');
        } else {
            $username = strip_tags(htmlspecialchars($_POST['username']));
            $password = strip_tags(htmlspecialchars($_POST['password']));

            $user = $this->loginManager->getLogin($username);

            if (!$user) {
                $_SESSION['flash']['danger'] = 'Mauvais identifiant';
                header('location: /login');
            } else {
                $isPasswordCorrect = password_verify($password, $user->getPassword());


                if ($isPasswordCorrect == false) {
                    $_SESSION['flash']['danger'] = 'Mot de passe incorrect !';
                    header('location: /login');

                } else {
                    $_SESSION['auth'] = $user;

                    if ($_SESSION['auth']->getStatus() == 1) {
                        header('location: /admin');
                    } else {
                        header('Location: /');
                    }
                }
            }
        }

    }

    public function deconnect()
    {
        session_destroy();
        session_unset();
        header('Location: /');
    }


    //beta
    public function register()
    {
        if ($this->loginManager->checkUsername()) {
            if ($this->loginManager->checkEmail()) {
                if ($this->loginManager->checkPassword()) {
                    $this->loginManager->registerUser();
                }
            }
        }

        header('Location: /login');
    }


}
