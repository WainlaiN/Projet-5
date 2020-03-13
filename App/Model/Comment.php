<?php


namespace App\Model;


class Comment
{

    /**
     * @var int $comment_id comment id
     */
    private $commentId;
    /**
     * @var int $authorId author id
     */
    private $authorId;
    /**
     * @var string $comment comment content
     */
    private $comment;
    /**
     * @var int $post_id post id
     */
    private $postId;
    /**
     * @var string $comment_date comment date update
     */
    private $commentDate;
    /**
     * @var bool $is_valid comment status
     */
    private $isValid;
    /**
     * @var string $username comment username
     */
    private $username;

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

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return Comment
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

}

