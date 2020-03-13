<?php


namespace App\Core;

use App\Core\TwigRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;



class Controller
{
    protected $session;
    protected $renderer;


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
        $this->session->getFlashBag()->clear();

    }


}