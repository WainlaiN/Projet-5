<?php


namespace App\Manager;

use App\Model\User;
use App\Core\Model;


class UserManager extends Model
{
    /**
     * @var string
     */
    protected $model = User::class;
    /**
     * @var string
     */
    protected $table_name = 'user';

    public function findByUsername($name)
    {
        $req = 'SELECT * FROM users WHERE name = ' . $name ;
        return $model = $this->custom_query($req);
    }



}