<?php


namespace App\Manager;

use PDO;
use App\Entity\Article;


class ArticleManager
{

    /**
     * @var  \PDO $pdo      PDO object linked to the database "blog"
     */
    private $pdo;

    /**
     * @var  \PDOStatement $pdoStatement        PDOStatement Object result from the function PDO::query and PDO::prépare
     */
    private $pdoStatement;



    /**
     * ArticleManager constructor.
     * Initialisation connexion to the database
     */
    public function __construct()
    {

    }

    /**
     * Insert Article object in BDD and Update Object
     *
     * @param Article $article
     *
     * @return bool is insert OK, fale if ERROR
     */
    public function create(Article $article){




    }

}