<?php


namespace App\Manager;


use App\Core\Model;
use App\Model\User;

class LoginManager extends Model

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
        //$sql = 'SELECT * FROM ' . $this->table_name . ';';
        return $this->custom_query($req);
    }

    public function getStatus($username)
    {
        $req = 'SELECT user_status FROM ' . $this->table_name . ' WHERE username= "' . $username .'";' ;
        return $this->custom_query($req);
    }

    public function findByUsername($name)
    {
        $req = 'SELECT * FROM users WHERE name = ' . $name ;
        return $this->custom_query($req);
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