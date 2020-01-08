<?php

namespace App\Table;


class Article
{

    /**
     * @var int $id post id
     */
    private $id;

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

    public static function getLast(){

        App\App::getDb()->prepare('SELECT * FROM post WHERE id=?', [$_GET['id']], 'App\Table\Article');
    }


    /**
     * @param $key string
     * @return mixed string converted to class method
     */
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$method();
    }


    /**
     * @return string post URL
     */
    public function getUrl()
    {
        return 'index.php?p=article&id=' . $this->getId();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->title = $titre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return $this->chapo;
    }


    /**
     * @return string $html Extract from description
     */
    public function getExtract()
    {
        $html = '<p>' . substr($this->description, 0, 250) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;

    }

    /**
     * @param mixed $chapo
     * @return Article
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $descriptif
     * @return Article
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $auteur
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param mixed $date_creation
     * @return Article
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdate()
    {
        return $this->date_update;
    }

    /**
     * @param mixed $date_maj
     * @return Article
     */
    public function setDateMaj($date_maj)
    {
        $this->date_maj = $date_maj;
        return $this;
    }


}

?>