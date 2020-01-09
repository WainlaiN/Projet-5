<?php


namespace App\Model;


class Comment
{
    /**
     * @var int $id comment id
     */
    public $id;
    /**
     * @var string $title title comment
     */
    public $author;

    /**
     * @var string $chapo chapo comment
     */
    public $comment;

    /**
     * @var string $$comment description comment
     */
    public $post_id;

    /**
     * @return int
     */
    /**
     * @var string $date_creation comment date creation
     */
    public $comment_date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Comment
     */
    public function setAuthor(string $author): Comment
    {
        $this->author = $author;
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
    public function setComment(string $comment): Comment
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostId(): string
    {
        return $this->post_id;
    }

    /**
     * @param string $post_id
     * @return Comment
     */
    public function setPostId(string $post_id): Comment
    {
        $this->post_id = $post_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentDate(): string
    {
        return $this->comment_date;
    }

    /**
     * @param string $comment_date
     * @return Comment
     */
    public function setCommentDate(string $comment_date): Comment
    {
        $this->comment_date = $comment_date;
        return $this;
    }


}

