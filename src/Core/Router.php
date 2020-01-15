<?php


namespace App\Core;


class Router
{
    /**
     * @var string
     */
    private $viewPath;

    private $router;



    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new Alto
    }

    public function get(string $url, string $template, ?string $name = null)
    {
        $this->router->map
    }
}