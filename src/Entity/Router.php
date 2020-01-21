<?php


namespace App\Entity;


class Router
{
    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var \AltoRouter
     */
    private $router;


    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get( $url,  $view, $name = null): self
    {

        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function run(): self
    {
        $match = $this->router->match();
        var_dump($match);
        $view = $match['target'];

        var_dump($this->viewPath . DIRECTORY_SEPARATOR . $view . '.php');
        require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';

        return $this;
    }
}