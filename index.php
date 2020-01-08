<?php
require "controller/frontend.php";

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "listPosts") {
            listPosts();

        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'getComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                getComment($_GET['id']);
            } else {
                throw new Exception('L\'id du commentaire est invalide');
            }
        } elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    editComment($_POST['author'], $_POST['comment'], $_GET['id']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else
                throw new Exception('Aucun identifiant de billet envoyé');
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    $errorMEssage = $e->getMessage();
    require('view/frontend/errorView.php');
}
