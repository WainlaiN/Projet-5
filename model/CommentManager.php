<?php

namespace App\Model;

require_once('model/Comment.php');
require_once("model/Database.php");



class CommentManager extends Database
{

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }

    public function addComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $addedComments = $comments->execute(array($postId, $author, $comment));

        return $addedComments;
    }

    public function editComment($author, $comment, $commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET author = ?, comment = ? WHERE id = ?');
        $editedComment = $comments->execute(array($author, $comment, $commentId));

        return $editedComment;
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $comments->execute(array(id));

        return $deletedComment;
    }


}