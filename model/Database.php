<?php
namespace App\Model;

class Database
{
    private static $db;

    protected function dbConnect()
    {
        if (self::$db === null) {
            $data = require __DIR__ . '/config.php';
            return new \PDO('mysql:host=' . $data['db_host'] . ';dbname=' . $data['db_name'] . ';charset=utf8',
                $data['db_user'], $data['db_password'],
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;

    }
}