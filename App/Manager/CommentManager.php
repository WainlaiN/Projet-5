<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\Comment;


/**
 * Class CommentManager
 * @package App\Manager
 */
class CommentManager extends Database
{

    /**
     * @var string
     */
    protected $model = Comment::class;
    /**
     * @var string
     */
    protected $table_name = 'comments';

    /**
     * @param $postId
     * @return array|mixed|null
     */
    public function getComments($postId)
    {

        $req = 'SELECT * FROM comments WHERE post_id = ' . $postId . ' ORDER BY comment_date DESC';
        $result = $this->sql($req);
        while ($datas = $result->fetchObject($this->model)) {
            $custom_array[] = new $this->model($datas);
        }
        return $custom_array;

    }

    /**
     * @param $id
     * @return array|mixed|null
     */
    public function getComment($id)
    {
        return $this->get($id);
    }

    /**
     * @param $postId
     * @param $author
     * @param $comment
     * @return array|mixed|null
     */
    public function addComment($postId, $author, $comment)
    {
        $newComments = 'INSERT INTO ' . $this->table_name . '(post_id, author, comment, comment_date, is_valid) VALUES (' . $postId . ', "' . $author . '", "' . $comment .'", DATE(NOW(), FALSE);';
        return $model = $this->custom_query($newComments);
    }

    /**
     * @param $commentId
     * @param $comment
     * @return array|mixed|null
     */
    public function editComment($commentId, $comment)
    {

        $editedComments = 'UPDATE ' . $this->table_name . ' SET comment = "' . $comment . '" WHERE id = ' . $commentId . ';';
        return $model = $this->custom_query($editedComments);
    }

    /**
     * @param $id
     * @return array|mixed|null
     */
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
