<?php

use App\Controller\PostController;
use App\Controller\CommentController;

require '../vendor/autoload.php';

$router = new AltoRouter();

$postController = new PostController();
$commentController = new CommentController();

// map homepage using callable
$router->map( 'GET', '/', $postController->listPosts(), 'list_all_posts');



// map post using callable
//$router->map( 'GET', '/post=[i:id]/', $postController->post(), 'list_post');

var_dump($router);

$match = $router->match();
var_dump($match);
//var_dump($match);







/**$postController = new PostController();
$commentController = new CommentController();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "listPosts") {
            $postController->listPosts();

        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postController->post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $commentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'getComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                $commentController->getComment($_GET['commentId']);
            } else {
                throw new Exception('L\'id du commentaire est invalide');
            }
        } elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $commentController->editComment($_GET['id'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else
                throw new Exception('Aucun identifiant de billet envoyé');
        }
    } else {
        $postController->listPosts();
    }
} catch (Exception $e) {
    $errorMEssage = $e->getMessage();
    $errorFile = $e->getFile();
    require('./../view/frontend/errorView.php');
}**/
