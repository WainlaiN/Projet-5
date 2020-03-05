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
     * Return if username is already used
     *
     * @return bool
     */
    public function checkUsername($username)
    {
        $sql = 'SELECT userid FROM users WHERE username = :username';
        $parameters = ['username' => $username];
        $req = $this->sql($sql, $parameters);
        $user = $req->fetchObject();
        if ($user) {
            $_SESSION['flash']['danger'] = 'Ce pseudo est dejà utilisé';
            return false;
        } else {
            return true;
        }
    }


    /**
     * Return if email is already used
     *
     * @return bool
     */
    public function checkEmail()
    {
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash']['danger'] = 'Email invalide';

            return false;
        } else {
            $email = $_POST['email'];
            $sql = 'SELECT userid from ' . $this->table_name . ' WHERE email = ?';
            $parameters = [$email];
            $result = $this->sql($sql, $parameters);
            $user = $result->fetchObject($this->model);

            if ($user) {
                $_SESSION['flash']['danger'] = 'Cet email est déjà utilisé.';
                return false;
            } else {
                return true;
            }
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
            $_SESSION['flash']['danger'] = 'Mot de passe différent';

            return false;

        } else {

            return true;
        }
    }

    /**
     * Register user
     *
     */
    public function registerUser()
    {
        $status = 2;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = 'INSERT INTO ' . $this->table_name . ' SET username = ?, password = ?, email = ?, user_status = ?';
        $parameters = [$_POST['username'], $password, $_POST['email'], $status];
        $this->sql($sql, $parameters);

    }
}