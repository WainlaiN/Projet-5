<?php
namespace App\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '1234');
        return $db;
    }

}