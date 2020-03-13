<?php


namespace App\Core;

use App\Core\TwigRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;


class Controller
{
    protected $session;
    protected $renderer;
    protected $request;


    public function __construct()
    {
        $this->renderer = new TwigRenderer();

        if (session_status() == PHP_SESSION_NONE) {
            $this->session = new Session\Session();
            $this->session->start();
        }
    }

    public function __destruct()
    {
        //$this->session->getFlashBag()->clear();
        $this->session->remove('warning');
        $this->session->remove('success');

    }

    private function setToken()
    {
        if (!isset($_SESSION['token']) OR empty($_SESSION['token'])) {
            $_SESSION['token'] = md5(bin2hex(openssl_random_pseudo_bytes(6)));
        }
    }

    /**Permet de controler la validité du jeton de securité reçu
     * @return bool
     */
    protected function tokenVerify()
    {
        if (isset($_SESSION['token'])) {
            if ($this->request->getToken() == $_SESSION['token']){
                return true;
            }
        }
        return false;
    }


}