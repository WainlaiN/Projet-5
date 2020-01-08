<?php

use App\Model\PostManager;
use App\Model\CommentManager;


require_once('./model/CommentManager.php');
require_once('./model/PostManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' .$postId);
    }

}

function getComment($id)
{
    $commentManager = new CommentManager();
    $affectedLine = $commentManager->getComment($id);

    if ($affectedLine === false) {
        throw new Exception('Impossible d\'afficher le commentaire !');
    }
    else {
        require('view/frontend/commentView.php');
    }

}

function editComment($commentId, $author, $comment)
{
    $commentManager = new CommentManager();
    $postId = $commentManager->getCommentPostId($commentId);
    var_dump($postId);
    $affectedLines = $commentManager->editComment($commentId, $author, $comment);

    //require('view/frontend/commentView.php');

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {

        header('Location: index.php?action=post&id=' .$postId);
    }

}