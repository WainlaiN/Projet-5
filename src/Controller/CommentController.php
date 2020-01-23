<?php
namespace App\Controller;

use App\Entity\View;
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

    public function getComment($id)
    {

        $comments = $this->commentManager->getComments($_GET['id']);
        $viewComments = new View('Comment');

        if (is_array($comments)) {
            $viewComments ->generateComment($comments);
        } else {
            $viewComments ->generateComment(array($comments));
        }

    }

    public function editComment($commentId)
    {

        $comment = $this->commentManager->editComment($commentId);
        $view = new View('EditComment');

        $view->generate($comment);

    }
}

