<?php


namespace App\Model;

use DateTime;

class Post
{
    /**
     * @var int $post_id post id
     */
    private $post_id;
    /**
     * @var string $title title post
     */
    private $title;

    /**
     * @var string $chapo chapo post
     */
    private $chapo;

    /**
     * @var string $description description post
     */
    private $description;

    /**
     * @var string $author author post
     */
    private $author;

    /**
     * @var string $date_creation post date creation
     */
    private $date_creation;

    /**
     * @var string $date_update post date update
     */
    private $date_update;

    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate($datas)
    {

        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return int
     */
    public function getPost_id(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     * @return Post
     */
    public function setPost_id(int $post_id)
    {
        $this->post_id = $post_id;
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
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Post
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * @param string $date_creation
     * @return Post
     */
    public function setDate_creation(string $date_creation)
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate_update(): string
    {
        return $this->date_update;
    }

    /**
     * @param string $date_update
     * @return Post
     */
    public function setDate_update(string $date_update = null)
    {
        $this->date_update = $date_update;
        return $this;
    }


}

