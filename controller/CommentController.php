<?php
namespace App\Controller;


use App\Model\CommentManager;

require_once('./model/CommentManager.php');


Class CommentController
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }

    public function addComment($postId, $author, $comment)
    {

        $affectedLines = $this->commentManager->addComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }

    }

    public function getComment($id)
    {

        $affectedLine = $this->commentManager->getComment($id);


        if ($affectedLine === false) {
            throw new Exception('Impossible d\'afficher le commentaire !');
        } else {
            require('view/frontend/commentView.php');
        }

    }

    public function editComment($commentId, $author, $comment)
    {

        $affectedLines = $this->commentManager->editComment($commentId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {

            header('Location: index.php?action=post&id=' . $_POST['postId']);
        }

    }
}

