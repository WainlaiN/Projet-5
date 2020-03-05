<?php


namespace App\Manager;

use App\Core\Database;
use App\Model\User;

/**
 * LoginManager Queries for Users
 */
class LoginManager extends Database

{

    protected $model = User::class;
    protected $table_name = 'users';

    /**
     * Return User Information
     *
     * @param $username
     * @return mixed
     */
    public function getLogin($username)
    {
        $req = 'SELECT * FROM ' . $this->table_name . ' WHERE username= :username ';
        $parameters = [':username' => $username];
        $result = $this->sql($req, $parameters);
        return $result->fetchObject($this->model);
    }

    /**
     * Return status for specific user
     *
     * @param $username
     * @return mixed
     */
    public function getStatus($username)
    {
        $req = 'SELECT user_status FROM ' . $this->table_name . ' WHERE username= :username ';
        $parameters = [':username' => $username];
        $result = $this->sql($req, $parameters);
        return $result->fetchObject($this->model);
    }

    /**
     * Return if User already exist
     *
     * @param $username
     * @param $email
     * @return bool|false|\PDOStatement
     */
    public function isMemberExists($username, $email)
    {
        $sql = 'SELECT * FROM ' . $this->table_name . ' WHERE username = :username OR email = :email';
        $parameters = [':username' => $username, ':email' => $email];
        $result = $this->sql($sql, $parameters);
        if ($result->rowCount() >= 1) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Return if password and password confirmation are the same
     *
     * @return bool
     */
    public function checkPassword($password, $passwordConfirm)
    {
        if ($password != $passwordConfirm) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Register user
     *
     */
    public function registerUser($username, $password, $email)
    {
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO ' . $this->table_name . ' SET username = :username, password = :password, email = :email, user_status = 2';
        $parameters = [':username' =>$username , ':password' => $hashedpassword, ':email' => $email];
        $this->sql($sql, $parameters);

    }
}