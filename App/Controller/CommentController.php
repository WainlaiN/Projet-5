<?php
namespace App\Controller;

use App\Model\View;
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
           // header('Location: index.php?action=post&id=' . $postId);
        }

    }

    public function getComment()
    {

        $comments = $this->commentManager->getComments($_GET['id']);
        $viewComments = new View('Comment');

        if (is_array($comments)) {
            $viewComments ->generateComment($comments);
        } else {
            $viewComments ->generateComment(array($comments));
        }

    }


}

