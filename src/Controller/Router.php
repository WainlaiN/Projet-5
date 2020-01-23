<?php


namespace App\Controller;

//use App\Controller\PostController;
//use App\Controller\CommentController;
use App\Entity\View;


class Router
{
    private $postController;
    private $commentController;

    public function __construct()
    {
        $this->postController = new PostController();
        $this->commentController = new CommentController();
    }

    public function routerRequest()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == "listPosts") {
                    $this->postController->listPosts();

                } elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->postController->post();
                        $this->commentController->getComment($_GET['id']);

                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }

                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->commentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        } else {
                            throw new \Exception('Tous les champs ne sont pas remplis');
                        }
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }

                } elseif ($_GET['action'] == 'getComment') {
                    if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                        $this->commentController->getComment($_GET['commentId']);
                    } else {
                        throw new \Exception('L\'id du commentaire est invalide');
                    }
                } elseif ($_GET['action'] == 'editComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->commentController->editComment($_GET['commentId']);
                        } else {
                            throw new \Exception('Tous les champs ne sont pas remplis');
                        }
                    } else
                        throw new \Exception('Aucun identifiant de billet envoyé');
                }
            } else {
                $this->postController->listPosts();
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $errorFile = $e->getFile();
            require('./../view/frontend/ViewError.php');
        }
    }

    private function home()
    {
        $view = new View("Home");
        $view->Generate(array());
    }


}

