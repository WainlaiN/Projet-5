<?php

namespace App\Manager;

use App\Entity\Comment;
use App\Core\Model;

/**
 * Class CommentManager
 * @package App\Manager
 */
class CommentManager extends Model
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
        //var_dump($req);
        return $model = $this->custom_query($req);

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
        $newComments = 'INSERT INTO ' . $this->table_name . '(post_id, author, comment, comment_date) VALUES (' . $postId . ', "' . $author . '", "' . $comment .'", DATE(NOW()));';
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

    public function validateComment($id)
    {

    }

}
