<?php

namespace App\Controller;

use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;


Class FrontController
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
    }

    public function home()
    {
        $this->_renderer->render('Frontend/homeView');
        $_SESSION['flash'] = array();
    }

    public function listPosts()
    {
        $list_posts = $this->_postManager->getPosts();
        $this->_renderer->render('Frontend/listPostView', ['listposts' => $list_posts]);
        $_SESSION['flash'] = array();
    }

    public function post($id)
    {
        $post = $this->_postManager->getPost($id);
        $list_comments = $this->_commentManager->getValidComments($id);
        $this->_renderer->render('Frontend/postView', ['post' => $post, 'listcomments' => $list_comments]);
        $_SESSION['flash'] = array();
    }

    public function addComment()
    {
        dump($_POST);
        $post_id = $_POST['postid'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        return $this->_commentManager->addComment($post_id, $author, $description);


    }

    public function login()
    {
        $this->_renderer->render('Frontend/loginView');
        $_SESSION['flash'] = array();
    }

    public function registerView()
    {
        $this->_renderer->render('Frontend/registeView');
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

            $user = $this->_loginManager->getLogin($username);

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
        if ($this->_loginManager->checkUsername()) {
            if ($this->_loginManager->checkEmail()) {
                if ($this->_loginManager->checkPassword()) {
                    $this->_loginManager->registerUser();
                }
            }
        }

        header('Location: /login');
    }

    //beta
    public function contactForm()
    {

        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash']['danger'] = 'Tous les champs ne sont pas remplis ou corrects.';
        } else {
            $nom = strip_tags(htmlspecialchars($_POST['nom']));
            $prenom = strip_tags(htmlspecialchars($_POST['prenom']));
            $email = strip_tags(htmlspecialchars($_POST['email']));
            $message = strip_tags(htmlspecialchars($_POST['message']));

            $this->formManager->fromTraiment($nom, $prenom, $email, $message);
            $_SESSION['flash']['success'] = 'Votre formulaire a bien été envoyer.';
        }
        header('Location: /');
    }

    public function cvNico()
    {

        $file = 'pdf/CV.pdf';
        //dump($file);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.filesize($file));
            readfile($file);
        }
    }


}
