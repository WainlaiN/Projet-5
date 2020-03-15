<?php

namespace App\Controller;

use App\Core\Controller;
use App\Manager\FormManager;
use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\FormValidator;
use Symfony\Component\HttpFoundation\Request;



/**
 * Class FrontController controller for Frontend
 */
Class FrontController extends Controller
{
    private $postManager;
    private $commentManager;
    private $formManager;
    private $loginManager;


    //private $request;
    //private $session;

    public function __construct()
    {
        parent::__construct();
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->loginManager = new LoginManager();
        $this->formManager = new FormManager();



    }

    /**public function __destruct()
     * {
     * //$this->session->getFlashBag()->clear();
     * $this->session->remove('warning');
     * $this->session->remove('success');
     * }**/

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

        if ($request->get('formtoken') == $this->session->get('token')) {

            if (!empty($request->request->all())) {

                $postId = FormValidator::purify($request->get('postid'));
                $authorId = FormValidator::purify($request->get('authorid'));
                $description = FormValidator::purifyContent($request->get('description'));

                $request = $this->commentManager->addComment($postId, $authorId, $description);

                if ($request === false) {
                    $this->session->set('warning', "Impossible d'ajouter le commentaire");

                } else {
                    $this->session->set('success', "Votre commentaire va être soumis à validation.");
                }
                $this->post($postId);
            }
        } else {
            $this->session->set('warning', "Veuillez pour reconnecter");
            $this->login();

        }
    }

    /**
     * Render the CGV View
     */
    public function getCGV()
    {
        $this->renderer->render('Frontend/MentionsView');
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
     *
     * @throws \Exception
     */
    public function connect()
    {
        $request = Request::createFromGlobals();
        $username = FormValidator::purify($request->get('username'));
        $password = FormValidator::purify($request->get('password'));

        if (!FormValidator::is_alphanum($username)) {
            $this->session->set('warning', "Votre pseudo $username n'est pas valide");
            $this->login();

        } elseif (!FormValidator::is_alphanum($password)) {
            $this->session->set('warning', "Votre mot de passe n'est pas valide");
            $this->login();

        } else {
            $user = $this->loginManager->getLogin($username);

            if (!$user) {
                $this->session->set('warning', "Cette identifiant n'existe pas");
                $this->login();

            } else {
                $isPasswordCorrect = password_verify($password, $user->getPassword());

                if ($isPasswordCorrect == false) {
                    $this->session->set('warning', "Mot de passe incorrect");
                    $this->login();

                } else {
                    $this->session->set('auth', $user);
                    $this->session->set('token', bin2hex(random_bytes(16)));

                    if ($this->session->get('auth')->getUserStatus() == '1') {

                        header('location: /admin');
                    } else {
                        $this->home();
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
        $this->session->clear();
        $this->home();
    }

    /**
     * Register a User using login manager
     */
    public function register()
    {
        $request = Request::createFromGlobals();
        $email = FormValidator::purify($request->get('email'));
        $username = FormValidator::purify($request->get('username'));
        $password = FormValidator::purify($request->get('password'));
        $passwordConfirm = FormValidator::purify($request->get('password_confirm'));

        if (!FormValidator::is_alphanum($username)) {
            $this->session->set('warning', "Votre pseudo n'est pas valide");
            $this->registerView();

        } elseif (!FormValidator::is_alphanum($password) || !FormValidator::is_alphanum($passwordConfirm)) {
            $this->session->set('warning', "Votre mot de passe n'est pas valide");
            $this->registerView();

        } elseif (!FormValidator::is_email($email)) {
            $this->session->set('warning', "Votre email n'est pas valide");
            $this->registerView();

        } else {

            if ($this->loginManager->isMemberExists($username, $email)) {
                if ($this->loginManager->checkPassword($password, $passwordConfirm)) {

                    $this->loginManager->registerUser($username, $password, $email);
                    $this->formManager->registerTraitment($email, $username);
                    $this->session->set('success', "Votre inscription a bien été prise en compte");
                    $this->login();

                } else {
                    $this->session->set('warning', "Les mots de passe ne sont pas identiques");
                    $this->registerView();
                }

            } else {
                $this->session->set('warning', "Cet utilisateur existe déjà");
                $this->registerView();
            }
        }
    }

    /**
     * Send an email from contact form using manager
     */
    public function contactForm()
    {
        $request = Request::createFromGlobals();
        $name = FormValidator::purify($request->get('name'));
        $forename = FormValidator::purify($request->get('forename'));
        $message = FormValidator::purify($request->get('message'));
        $email = FormValidator::purify($request->get('email'));

        if (!isset($name) || !isset($forename) || !isset($email) || !isset($message) || !FormValidator::is_email($email)) {
            $this->session->set('warning', "Tous les champs ne sont pas remplis ou corrects.");
        } else {

            $this->formManager->fromTraitment($name, $forename, $email, $message);
            $this->session->set('success', "Votre formulaire a bien été envoyé.");
        }
        $this->home();
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
