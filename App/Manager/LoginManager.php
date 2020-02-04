<?php


namespace App\Manager;


use App\Core\Database;
use App\Model\User;

class LoginManager extends Database

{
    /**
     * @var string
     */
    protected $model = User::class;
    /**
     * @var string
     */
    protected $table_name = 'users';

    public function getLogin($username)
    {
        $req = 'SELECT * FROM ' . $this->table_name . ' WHERE username= "' . $username .'";' ;
        $result = $this->sql($req);
        return $result->fetchObject($this->model);

    }

    public function getStatus($username)
    {
        $req = 'SELECT user_status FROM ' . $this->table_name . ' WHERE username= "' . $username .'";' ;
        $result = $this->sql($req);
        return $result->fetchObject($this->model);
    }

    public function findByUsername($name)
    {
        $req = 'SELECT * FROM users WHERE name = ' . $name ;
        $result = $this->sql($req);
        return $result->fetchObject($this->model);;
    }

    public function checkEmail()
    {

    }

    public function checkPassword($password, $user)
    {


    }

    public function registerUser()
    {

    }








}