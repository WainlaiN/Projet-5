<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\User;

/**
 * LoginManager Queries for Users
 */
class LoginManager extends Database
{

     /**
     * Return User Information
     *
     * @param  $username
     * @return mixed
     */
    public function getLogin($username)
    {
        $req = 'SELECT * FROM users WHERE username= :username ';
        $parameters = [':username' => $username];
        $result = $this->sql($req, $parameters);
        $data = $result->fetch(\PDO::FETCH_ASSOC);
        return new User($data);

    }

    /**
     * Return status for specific user
     *
     * @param  $username
     * @return mixed
     */
    public function getStatus($username)
    {
        $req = 'SELECT user_status FROM users WHERE username= :username ';
        $parameters = [':username' => $username];
        $result = $this->sql($req, $parameters);
        $data = $result->fetch(\PDO::FETCH_ASSOC);
        return new User($data);

    }

    /**
     * Return if User already exist
     *
     * @param  $username
     * @param  $email
     * @return bool|false|\PDOStatement
     */
    public function isMemberExists($username, $email)
    {
        $sql = 'SELECT * FROM users WHERE username = :username OR email = :email';
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
        $sql = 'INSERT INTO users SET username = :username, password = :password, email = :email, user_status = 2';
        $parameters = [':username' =>$username , ':password' => $hashedpassword, ':email' => $email];
        $this->sql($sql, $parameters);

    }
}