<?php
namespace App\Model;

class Manager
{

    protected function dbConnect()
    {
        //read data array
        $data = require __DIR__ .'/config.php';
        return new \PDO('mysql:host=' . $data['db_host'] . ';dbname=' .$data['db_name'] . ';charset=utf8',
        $data['db_user'], $data['db_password'],
        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
    }

}