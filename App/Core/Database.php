<?php

namespace App\Core;

use \PDO;


class Database
{
    protected $db;



    protected function dbConnect()
    {
        if ($this->db === null) {
            $data = require __DIR__ . './../Config/config.php';
            return new PDO('mysql:host=' . $data['db_host'] . ';dbname=' . $data['db_name'] . ';charset=utf8',
                $data['db_user'], $data['db_password'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;

    }

    protected function sql($sql, $parameters = null, $binds = null)
    {

        if ($parameters || $binds) {
            $result = $this->dbConnect()->prepare($sql);

            if ($binds) {
                foreach ($binds as $bind) {
                    $result->bindParam($bindnew[0], $bindnew[1], $bindnew[2]);
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

    /**protected function custom_query($sql)

    {
        //dump($sql, $this->model);
        $db = $this->dbConnect();
        $req = $db->query($sql);


        if ($req->rowCount() == 0) {
            return Null;
        } elseif ($req->rowCount() == 1) {
            if (!is_null($this->model)) {
                dump($req);
                //$req->closeCursor();
                return $req->fetchObject($this->model);

            } else {
                //$req->closeCursor();
                return $req->fetch(PDO::FETCH_OBJ);
            }

        } else {
            if (!is_null($this->model)) {

                while ($datas = $req->fetchObject($this->model)) {
                    $custom_array[] = new $this->model($datas);
                }

                $req->closeCursor();
                return $custom_array;

            } else {
                $req->closeCursor();
                return $req->fetchAll(PDO::FETCH_OBJ);
            }

        }

    }**/


}