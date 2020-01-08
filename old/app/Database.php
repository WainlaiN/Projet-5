<?php

namespace App;



use \PDO;


class Database
{

    private $db_name;
    private $db_user;
    private $db_password;
    private $db_host;
    private $pdo;


    public function __construct($db_name, $db_user, $db_password, $db_host)
    {

        $this->db_name = $db_name;
        $this->db_password = $db_password;
        $this->db_user = $db_user;
        $this->db_host = $db_host;

    }

    private function getPDO()
    {
        if ($this->pdo === null) {

            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', '1234');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            return $pdo;

        }

        return $this->pdo;


    }

    public function query($statement, $class_name)
    {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;


    }

    public function prepare($statement, $attributes, $class_name, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

}