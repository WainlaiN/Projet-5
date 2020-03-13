<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\Comment;

/**
 * CommentManager Queries for Comments
 */
class CommentManager extends Database
{

    /**
     * Return Comments from a post
     *
     * @param $postId
     * @return array|mixed
     */
    public function getComments($postId)
    {
        $req = 'SELECT comment_id, author_id, comment, is_valid, post_id, users.username, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS commentdate FROM comments INNER JOIN users on comments.author_id=users.user_id WHERE post_id = :postId ORDER BY commentdate DESC';
        $parameters = [':postId' => $postId];
        $result = $this->sql($req, $parameters);
        $custom_array = [];

            while ($datas = $result->fetch(\PDO::FETCH_ASSOC)) {
                array_push($custom_array, New Comment($datas));
            }
            return $custom_array;

    }

    /**
     * Return Comment from ID
     *
     * @param $commentId
     * @return bool|false|\PDOStatement
     */
    public function getComment($commentId)
    {
        $req = 'SELECT comment_id, author_id, comment, is_valid, post_id, users.username, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments INNER JOIN users on comments.author_id=users.user_id WHERE comments.id = :id';
        $parameters = [':id' => $commentId];
        return $this->sql($req, $parameters);
    }

    /**
     * Add Comment from a user
     *
     * @param $postId
     * @param $author_id
     * @param $author
     * @param $comment
     * @return bool|false|\PDOStatement
     */
    public function addComment($postId, $authorId , $comment)
    {
        $newComments = 'INSERT INTO comments(post_id, author_id, comment, comment_date) VALUES (:postId,:authorId,:comment, DATE(NOW()))';
        $parameters = [':postId' => $postId, ':authorId' => $authorId, ':comment' => $comment];

        return $this->sql($newComments, $parameters);

    }

    /**
     * Delete Comment from ID
     *
     * @param $commentId
     * @return bool|false|\PDOStatement
     */
    public function deleteComment($commentId)
    {
        $comment = 'DELETE FROM comments WHERE comment_id= :id';
        $parameters = [':id' => $commentId];
        $result = $this->sql($comment, $parameters);
        return $result;
    }

    /**
     * Get Only Valid Comments
     *
     * @param $postId
     * @return array|mixed
     */
    public function getValidComments($postId)
    {
        $validComments = 'SELECT comment_id, author_id, comment, is_valid, post_id, users.username, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments INNER JOIN users on comments.author_id=users.user_id WHERE is_valid = :valid AND post_id = :postid';
        $parameters = [':valid' => 1, ':postid' => $postId];
        $result = $this->sql($validComments, $parameters);
        $custom_array = [];

        while ($datas = $result->fetch(\PDO::FETCH_ASSOC)) {
            array_push($custom_array, New Comment($datas));
        }

        return $custom_array;
    }

    /**
     * Get Only Invalid Comments
     *
     * @return array|mixed
     */
    public function getInvalidComments()
    {
        $invalidComments = 'SELECT * FROM comments WHERE is_valid = :valid';
        $parameters = [':valid' => 0];
        $result = $this->sql($invalidComments, $parameters);
        $custom_array = [];

        while ($datas = $result->fetch(\PDO::FETCH_ASSOC)) {
            array_push($custom_array, New Comment($datas));
        }
        return $custom_array;
    }

    /**
     * Validate a Comment
     *
     * @param $commentId
     * @return bool|false|\PDOStatement
     */
    public function validateComment($commentId)
    {
        $validate = 'UPDATE comments SET is_valid = :valid WHERE comment_id = :id';
        $parameters = [':id' => $commentId, ':valid' => 1];
        $result = $this->sql($validate, $parameters);
        return $result;
    }

}
