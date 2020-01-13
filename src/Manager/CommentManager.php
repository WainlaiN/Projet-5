<?php

namespace App\Manager;

use App\Entity\Comment;
use App\Core\Model;

class CommentManager extends Model
{

    protected $model = Comment::class;
    protected $table_name = 'comments';

    public function getComments($postId)
    {

        $req = 'SELECT * FROM comments WHERE post_id = ' . $postId . ' ORDER BY comment_date DESC';
        return $this->custom_query($req);

    }

    public function getComment($id)
    {
        return $this->get($id);
    }

    public function addComment($postId, $author, $comment)
    {

        $newComments = 'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(' . $postId . ', ' . $author . ', ' . $comment .', NOW())');
        return $this->custom_query($newComments);
    }

    public function editComment($author, $comment, $commentId)
    {

        $editedComments = 'UPDATE comments SET author = ' . $author . ' , comment = ' . $comment . ' WHERE id = ' . $commentId . ';';
        return $this->custom_query($editedComments);
    }

    public function deleteComment($id)
    {
        return $this->delete($id);
    }

}
