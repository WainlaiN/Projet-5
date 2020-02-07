<?php

namespace App\Controller;

use App\Manager\LoginManager;
//use App\Model\ViewAdmin;
use App\Model\ViewPublic;
use App\Manager\PostManager;
use App\Manager\CommentManager;



Class FrontController
{
    private $postManager;
    private $commentManager;
    private $loginManager;


    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->loginManager = new LoginManager();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function home() {
        $view = new ViewPublic('Home');
        $view->generate(array());
    }

    public function listPosts()
    {
        $posts = $this->postManager->getPosts();
        $view = new ViewPublic('ListPosts');
        $view->generate($posts);

    }

    public function post($id)
    {
        $post = $this->postManager->getPost($id);
        $viewPost = new ViewPublic('Post');
        $comment = $this->commentManager->getComments($id);
        $viewComment = new ViewPublic('Comment');
        $viewPost->generate($post);
        $viewComment->generatecomment($comment);

    }

    public function login()
    {
        $view = new ViewPublic('Login');
        $view->generate(array());

    }

    public function registerView()
    {
        $view = new ViewPublic('Register');
        $view->generate(array());

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
            //dump($user);


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
