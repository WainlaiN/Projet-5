<?php


namespace App\Model;

use DateTime;

class Post
{
    /**
     * @var int $post_id post id
     */
    public $postId;
    /**
     * @var string $title title post
     */
    public $title;

    /**
     * @var string $chapo chapo post
     */
    public $chapo;

    /**
     * @var string $description description post
     */
    public $description;

    /**
     * @var int $authorid author post
     */
    public $authorId;

    /**
     * @var string $date_creation post date creation
     */
    public $dateCreation;

    /**
     * @var string $date_update post date update
     */
    public $dateUpdate;

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
     * @return int
     */
    public function getPostId(): int
    {
        return $this->$postId;
    }

    /**
     * @param int $postId
     * @return Post
     */
    public function setPostId(int $postId)
    {
        $this->postId = $postId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getChapo(): string
    {
        return $this->chapo;
    }

    /**
     * @param string $chapo
     * @return Post
     */
    public function setChapo(string $chapo)
    {
        $this->chapo = $chapo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Post
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param string $author
     * @return Post
     */
    public function setAuthorId(int $authorid)
    {
        $this->authorId = $authorid;
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param string $dateCreation
     * @return Post
     */
    public function setDateCreation(string $dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateUpdate(): string
    {
        return $this->dateUpdate;
    }

    /**
     * @param string $dateUpdate
     * @return Post
     */
    public function setDateUpdate(string $dateUpdate = null)
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
    }


}

