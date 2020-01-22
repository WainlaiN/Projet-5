<?php
namespace App\Controller;

use App\Manager\CommentManager;

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
            require('./../view/frontend/EditComment.php');
        }

    }

    public function editComment($commentId, $comment)
    {

        $affectedLines = $this->commentManager->editComment($commentId, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {

            header('Location: index.php?action=post&id=' . $_POST['postId']);
        }

    }
}

