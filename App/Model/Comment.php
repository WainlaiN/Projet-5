<?php


namespace App\Model;


class Comment
{

    /**
     * @var int $comment_id comment id
     */
    public $commentId;
    /**
     * @var int $authorId author id
     */
    public $authorId;
    /**
     * @var string $comment comment content
     */
    public $comment;
    /**
     * @var int $post_id post id
     */
    public $postId;
    /**
     * @var string $comment_date comment date update
     */
    public $commentDate;
    /**
     * @var bool $is_valid comment status
     */
    public $isValid;


    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate($datas)
    {
        foreach ($datas as $key => $value) {
            $key = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @param int $commentId
     * @return Comment
     */
    public function setCommentId(int $commentId)
    {
        $this->commentId = $commentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentId(): int
    {
        return $this->commentId;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $author
     * @return Comment
     */
    public function setAuthorId(int $author)
    {
        $this->authorId = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param string $postId
     * @return Comment
     */
    public function setPostId(int $postId)
    {
        $this->postId = $postId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param string $commentDate
     * @return Comment
     */
    public function setCommentDate(string $commentDate)
    {
        $this->commentDate = $commentDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * @param mixed $isValid
     * @return Comment
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
        return $this;
    }

}

