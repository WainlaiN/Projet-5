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

        $req = 'SELECT * FROM ' . $this->table_name . ' WHERE post_id = :postId ORDER BY comment_date DESC';
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
        $req = 'SELECT * FROM comments WHERE id = :id';
        $parameters = [':id' => $id];
        return $result = $this->sql($req, $parameters);
    }

    public function addComment($postId, $author, $comment)
    {
        $newComments = 'INSERT INTO ' . $this->table_name . '(post_id, author_id, comment, comment_date, is_valid) VALUES (:postId,:author,:comment, DATE(NOW()),:valid)';
        $parameters = [':postId' => $postId, ':author' => $author, ':comment' => $comment, ':valid' => 0];
        $result = $this->sql($newComments, $parameters);
        return $result;
    }


    public function editComment($commentId, $comment)
    {

        $editedComments = 'UPDATE ' . $this->table_name . ' SET comment = :comment WHERE id = :id';
        $parameters = [':comment' => $commentId, ':id' => $commentId];
        $result = $this->sql($editedComments, $parameters);
        return $result;
    }

    public function deleteComment($id)
    {
        $comment = 'DELETE FROM ' . $this->table_name . ' WHERE id= :id';
        $parameters = [':id' => $id];
        $result = $this->sql($comment, $parameters);
        return $result;
    }

    public function getValidComments($postId)
    {
        $validComments = 'SELECT * FROM ' . $this->table_name . ' WHERE is_valid = :valid AND post_id = :postid';
        $parameters = [':valid' => 1, ':postid' => $postId];
        $result = $this->sql($validComments, $parameters);
        if ($result->rowCount() > 1) {
            while ($datas = $result->fetchObject($this->model)) {
                $custom_array[] = new $this->model($datas);
            }
            return $custom_array;
        } else {
            return $result->fetchObject($this->model);
        }
    }

    public function getInvalidComments()
    {
        $invalidComments = 'SELECT * FROM ' . $this->table_name . ' WHERE is_valid = :valid';
        $parameters = [':valid' => 0];
        $result = $this->sql($invalidComments, $parameters);
        if ($result->rowCount() > 1) {
            while ($datas = $result->fetchObject($this->model)) {
                $custom_array[] = new $this->model($datas);
            }
            return $custom_array;
        } else {
            return $result->fetchObject($this->model);
        }

    }

    public function validateComment($commentId)
    {
        $validate = 'UPDATE ' . $this->table_name . ' SET is_valid = :valid WHERE id = :id';
        $parameters = [':id' => $commentId, ':valid' => 1];
        $result = $this->sql($validate, $parameters);
        return $result;


    }

}
