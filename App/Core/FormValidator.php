<?php


namespace App\Core;


class FormValidator
{
    /**
     * Check if is not empty and purify
     *
     * @param mixed $param
     *
     * @return mixed $param
     */
    public static function purify($data)
    {
        if (isset($data) && ($data != '')) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data,ENT_QUOTES, 'UTF-8');

            return $data;
        } else {
            return false;
            //$_SESSION['flash']['danger'] = 'Les champs ne sont pas remplis';
            //header('Location: /admin');
        }
    }

    /**
     * Check if is not emoty
     *
     * @param $data
     *
     * @return bool
     */
    public static function purifyContent($data)
    {
        if (isset($data) && ($data != '')) {
            return $data;
        } else {
            return false;
            //$_SESSION['flash']['danger'] = 'Les champs ne sont pas remplis';
            //header('Location: /admin');
        }
    }

    /**
     * Check if is alpha
     *
     * @param $value
     *
     * @return bool
     */
    public static function is_alpha($value){
        if (preg_match('/^[a-zA-Z]+$/', $value)) return true;

    }

    /**
     * Check if alphanumeric
     *
     * @param $value
     *
     * @return bool
     */
    public static function is_alphanum($value){
        if(preg_match('/^[a-zA-Z0-9_]+$/', $value)) return true;
    }

    /**
     * Check if is email
     *
     * @param $value
     *
     * @return bool
     */
    public static function is_email($value){
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) return true;
    }
}