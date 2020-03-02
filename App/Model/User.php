<?php


namespace App\Model;


class User
{
    /**
     * @var int $user_id user ID
     */
    private $user_id;

    /**
     * @var string $username user name
     */
    private $username;

    /**
     * @var string $mail user email
     */
    private $mail;

    /**
     * @var string $password password
     */
    private $password;

    /**
     * @var string $user_status user status
     */
    private $user_status;

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * @return User
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->user_status;
    }

    /**
     * @param string $status
     * @return User
     */
    public function setStatus(string $status)
    {
        $this->user_status = $status;
        return $this;
    }





}