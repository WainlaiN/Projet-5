<?php


namespace App\Core;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;


class TwigRenderer
{
    private $_twig;

    public function render($view, $params = [])
    {
        $loader = new FilesystemLoader('view');
        $this->_twig = new Environment(
            $loader, [
            'cache' => false, // __DIR__ . /tmp',
            'debug' => true,]
        );
        $this->_twig->addExtension(new DebugExtension());
        if (isset($_SESSION['flash'])) {
            $this->_twig->addGlobal('session', $_SESSION);
        }

        try {
            echo $this->_twig->render($view . '.twig', $params);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

}