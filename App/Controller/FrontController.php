<?php

namespace App\Controller;

use App\Manager\FormManager;
use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;

/**
 * Class FrontController controller for Frontend
 */
Class FrontController
{
    private $_postManager;
    private $_commentManager;
    private $_loginManager;
    private $_renderer;
    private $_formManager;

    public function __construct()
    {
        $this->_postManager = new PostManager();
        $this->_commentManager = New CommentManager();
        $this->_loginManager = new LoginManager();
        $this->_renderer = new TwigRenderer();
        $this->_formManager = new FormManager();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Render Home
     */
    public function home()
    {
        $this->_renderer->render('Frontend/homeView');

    }

    /**
     * Render the Posts view from the post manager
     */
    public function listPosts()
    {
        $list_posts = $this->_postManager->getPosts();
        $this->_renderer->render('Frontend/listPostView', ['listposts' => $list_posts]);

    }

    /**
     * Render the Post view from the post manager
     * @param $postId
     */
    public function post($postId)
    {
        $post = $this->_postManager->getPost($postId);
        $list_comments = $this->_commentManager->getValidComments($postId);
        $this->_renderer->render('Frontend/postView', ['post' => $post, 'listcomments' => $list_comments]);

    }

    /**
     * Add a Comment using comment manager
     */
    public function addComment()
    {
        $post_id = $_POST['postid'];
        $author_id = $_POST['author'];
        $author_ = $_SESSION['auth']->getUsername();
        $description = $_POST['description'];
        $request = $this->_commentManager->addComment($post_id, $author_id, $author_, $description);

        if ($request === false) {
            $_SESSION['flash']['danger'] = 'Impossible d\'ajouter le commentaire !';
        } else {
            $_SESSION['flash']['success'] = 'Votre commentaire va être soumis à validation.';
        }

        header('Location: /post/' . $_POST['postid']);

    }

    /**
     * Render the CGV View
     */
    public function getCGV()
    {
        $this->_renderer->render('Frontend/cgvView');

    }


    /**
     * Render the Login View
     */
    public function login()
    {
        $this->_renderer->render('Frontend/loginView');

    }

    /**
     * Render the Register View
     */
    public function registerView()
    {
        $this->_renderer->render('Frontend/registeView');


    }

    /**
     * Connect a User using manager
     */
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

    /**
     * Disconnect a User
     */
    public function deconnect()
    {
        session_destroy();
        session_unset();
        header('Location: /');
    }

    /**
     * Register a User using login manager
     */
    public function register()
    {
        if ($this->_loginManager->checkUsername()) {
            if ($this->_loginManager->checkEmail()) {
                if ($this->_loginManager->checkPassword()) {
                    $this->_loginManager->registerUser();
                    $this->_formManager->registerTraitment($_POST['email'], $_POST['username']);
                }
            }
        }
        $_SESSION['flash']['success'] = 'Votre inscription a bien été prise en compte.';

        header('Location: /login');
    }

    /**
     * Send an email for contact form using manager
     */
    public function contactForm()
    {

        if (empty($_POST['name']) || empty($_POST['forename']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'],
                FILTER_VALIDATE_EMAIL)
        ) {
            $_SESSION['flash']['danger'] = 'Tous les champs ne sont pas remplis ou corrects.';
        } else {
            $nom = strip_tags(htmlspecialchars($_POST['name']));
            $prenom = strip_tags(htmlspecialchars($_POST['forename']));
            $email = strip_tags(htmlspecialchars($_POST['email']));
            $message = strip_tags(htmlspecialchars($_POST['message']));

            $this->_formManager->fromTraitment($nom, $prenom, $email, $message);
            $_SESSION['flash']['success'] = 'Votre formulaire a bien été envoyé.';
        }
        header('Location: /');
    }

    /**
     * Download the CV
     */
    public function cvNico()
    {

        $file = 'pdf/CV.pdf';
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
        }
    }
}
