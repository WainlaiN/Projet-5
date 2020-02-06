<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\Comment;


class CommentManager extends Database
{

    protected $model = Comment::class;
    protected $table_name = 'comments';

    public function getComments($postId)
    {

        $req = 'SELECT * FROM comments WHERE post_id = :postId ORDER BY comment_date DESC';
        $parameters = [':postId' => $postId];
        $result = $this->sql($req, $parameters);

        if ($result->rowCount() > 1) {
            while ($datas = $result->fetchObject($this->model)) {
                $custom_array[] = new $this->model($datas);
            }
            return $custom_array;
        } else {
            return $result->fetchObject($this->model);
        }
    }


    public function getComment($id)
    {
        return $this->get($id);
    }


    public function addComment($postId, $author, $comment)
    {
        $newComments = 'INSERT INTO ' . $this->table_name . '(post_id, author, comment, comment_date, is_valid) VALUES (' . $postId . ', "' . $author . '", "' . $comment . '", DATE(NOW(), FALSE);';
        return $model = $this->custom_query($newComments);
    }


    public function editComment($commentId, $comment)
    {

        $editedComments = 'UPDATE ' . $this->table_name . ' SET comment = "' . $comment . '" WHERE id = ' . $commentId . ';';
        return $model = $this->custom_query($editedComments);
    }


    public function deleteComment($id)
    {
        return $this->delete($id);
    }

    public function getInvalidComments()
    {
        $invalidComments = 'SELECT * FROM ' . $this->table_name . ' WHERE is_valid = FALSE;';
        return $model = $this->custom_query($invalidComments);
    }

    public function validateComment($commentId)
    {
        $editedComments = 'UPDATE ' . $this->table_name . ' SET is_valid = TRUE WHERE id = ' . $commentId . ';';
        return $model = $this->custom_query($editedComments);

    }

}
