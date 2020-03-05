<?php

namespace App\Controller;

use App\Manager\FormManager;
use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;
use Symfony\Component\HttpFoundation\Request;
use App\Core\FormValidator;

/**
 * Class FrontController controller for Frontend
 */
Class FrontController
{
    private $postManager;
    private $commentManager;
    private $loginManager;
    private $renderer;
    private $formManager;
    private $request;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->loginManager = new LoginManager();
        $this->renderer = new TwigRenderer();
        $this->formManager = new FormManager();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Render Home
     */
    public function home()
    {
        $this->renderer->render('Frontend/homeView');
    }

    /**
     * Render the Posts view from the post manager
     */
    public function listPosts()
    {
        $list_posts = $this->postManager->getPosts();
        $this->renderer->render('Frontend/listPostView', ['listposts' => $list_posts]);
    }

    /**
     * Render the Post view from the post manager
     *
     * @param $postId
     */
    public function post($postId)
    {
        $post = $this->postManager->getPost($postId);
        $list_comments = $this->commentManager->getValidComments($postId);
        $this->renderer->render('Frontend/postView', ['post' => $post, 'listcomments' => $list_comments]);
    }

    /**
     * Add a Comment using comment manager
     */
    public function addComment()
    {
        $request = Request::createFromGlobals();

        if (!empty($request->request->all())) {
            $postId = FormValidator::purify($request->get('postid'));
            $authorId = FormValidator::purify($request->get('authorid'));
            $author = FormValidator::purify($request->get('authorname'));
            $description = FormValidator::purifyContent($request->get('description'));

            $request = $this->commentManager->addComment($postId, $authorId, $author, $description);

            if ($request === false) {
                $_SESSION['flash']['danger'] = 'Impossible d\'ajouter le commentaire !';
            } else {
                $_SESSION['flash']['success'] = 'Votre commentaire va être soumis à validation.';
            }

            header('Location: /post/' . $postId);
        }
    }

    /**
     * Render the CGV View
     */
    public function getCGV()
    {
        $this->renderer->render('Frontend/cgvView');
    }

    /**
     * Render the Login View
     */
    public function login()
    {
        $this->renderer->render('Frontend/loginView');
    }

    /**
     * Render the Register View
     */
    public function registerView()
    {
        $this->renderer->render('Frontend/registeView');
    }

    /**
     * Connect a User using manager
     */
    public function connect()
    {
        $request = Request::createFromGlobals();
        $username = FormValidator::purify($request->get('username'));
        $password = FormValidator::purify($request->get('password'));

        if (empty($username) || !FormValidator::is_alphanum($username)) {
            $_SESSION['flash']['danger'] = 'Votre pseudo ' . $username . ' n\'est pas valide';
            header('location: /login');

        } elseif (empty($password) || !FormValidator::is_alphanum($password)) {
            $_SESSION['flash']['danger'] = "Votre mot de passe n'est pas valide";
            header('location: /login');

        } else {
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
        $request = Request::createFromGlobals();
        $email = FormValidator::purify($request->get('email'));
        $username = FormValidator::purify($request->get('username'));

        if (empty($username) || !FormValidator::is_alphanum($username)) {
            $_SESSION['flash']['danger'] = 'Votre pseudo ' . $username . ' n\'est pas valide';
            header('location: /login');

        } elseif (empty($password) || !FormValidator::is_alphanum($password)) {
            $_SESSION['flash']['danger'] = "Votre mot de passe n'est pas valide";
            header('location: /login');

        } else {

            if ($this->loginManager->checkUsername($username)) {
                if ($this->loginManager->checkEmail()) {
                    if ($this->loginManager->checkPassword()) {
                        $this->loginManager->registerUser();
                        $this->formManager->registerTraitment($email, $username);
                    }
                }
            }
            $_SESSION['flash']['success'] = 'Votre inscription a bien été prise en compte.';

            header('Location: /login');
        }
    }

        /**
         * Send an email for contact form using manager
         */
        public
        function contactForm()
        {
            $request = Request::createFromGlobals();
            $name = FormValidator::purify($request->get('name'));
            $forename = FormValidator::purify($request->get('forename'));
            $message = FormValidator::purify($request->get('message'));
            $email = FormValidator::purify($request->get('email'));

            if (empty($name) || empty($forename) || empty($email) || empty($message) || !FormValidator::is_email($email)) {
                $_SESSION['flash']['danger'] = 'Tous les champs ne sont pas remplis ou corrects.';
            } else {

                $this->formManager->fromTraitment($name, $forename, $email, $message);
                $_SESSION['flash']['success'] = 'Votre formulaire a bien été envoyé.';
            }
            header('Location: /');
        }

        /**
         * Download the CV
         */
        public
        function cvNico()
        {
            $file = 'public/pdf/CV.pdf';
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
