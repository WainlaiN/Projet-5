<?php

namespace App\Entity;


class View
{
    private $fileName;

    private $title;


    public function __construct($name)
    {

        $this->fileName = "../view/View" . $name . ".php";

    }

    public function generate($datas)
    {
        $content = $this->generateFile($this->fileName, $datas);
        $view = $this->generateFile('../view/layout.php',
            array(
                'title' => $this->title,
                'content' => $content
            ));

        echo $view;
    }

    public function generateComment($datas)
    {
        $view = $this->generateFile($this->fileName, $datas);

        echo $view;
    }

    private function generateFile($file, $datas)
    {

        if (file_exists($file)) {

            if (!is_object($datas)) {
                extract($datas);
            }

            ob_start();

            require $file;

            return ob_get_clean();

        } else {
            echo "Fichier '$file introuvable";
        }
    }

    public function clean($data)
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8', false);
    }


}