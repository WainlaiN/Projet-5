<?php


namespace App\Core;


class FormValidator
{
    /**
     * Check is not empty and purify
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

    public static function is_alpha($value){
        if(filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z]+$/")))) return true;
    }

    public static function is_alphanum($value){
        if(filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z0-9]+$/")))) return true;
    }

    public static function is_email($value){
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) return true;
    }
}