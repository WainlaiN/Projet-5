<?php


namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class TwigRenderer
{
    private $twig;

    public function render($view, $params = [])
    {
        $loader = new FilesystemLoader('view');
        $this->twig = new Environment($loader, [
            'cache' => false, // __DIR__ . /tmp',
            'debug' => true,
        ]);
        if (isset($_SESSION['flash'])) {
            $this->twig->addGlobal('session', $_SESSION);
        }

        echo $this->twig->render($view . '.twig', $params);
    }

}