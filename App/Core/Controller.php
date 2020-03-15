<?php


namespace App\Core;

use App\Core\TwigRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;


class Controller
{
    protected $session;
    protected $renderer;
    protected $request;


    public function __construct()
    {
        $this->renderer = new TwigRenderer();

        if (session_status() == PHP_SESSION_NONE) {
            $this->session = new Session\Session;
            $this->session->start();
        }
    }

    public function __destruct()
    {
        //$this->session->getFlashBag()->clear();
        //$this->session->remove('warning');
        //$this->session->remove('success');

    }
}