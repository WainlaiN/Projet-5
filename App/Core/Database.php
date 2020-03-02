<?php

namespace App\Core;

use \PDO;


class Database
{
    /**
     * @var
     */
    protected $database;

    /**
     * @return PDO
     */
    protected function dbConnect()
    {
        if ($this->database === null) {
            $data = require __DIR__ . './../Config/config.php';
            return new PDO('mysql:host=' . $data['db_host'] . ';dbname=' . $data['db_name'] . ';charset=utf8',
                $data['db_user'], $data['db_password'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->database;
    }

    /**
     * @param $sql
     * @param null $parameters
     * @param null $binds
     * @return bool|false|\PDOStatement
     */
    protected function sql($sql, $parameters = null, $binds = null)
    {

        if ($parameters || $binds) {
            $result = $this->dbConnect()->prepare($sql);

            if ($binds) {
                foreach ($binds as $bind) {
                    $result->bindParam($bind[0], $bind[1], $bind[2]);
                }
                $result->execute();
            } else {
                $result->execute($parameters);
            }

            return $result;
        } else {
            $result = $this->dbConnect()->query($sql);

            return $result;
        }
    }
}