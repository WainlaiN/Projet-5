<?php

namespace App\Entity;


class View
{
    private $fileName;

    private $title;
    private $header;
    private $subheader;
    private $button;

    public function __construct($name)
    {

        $this->fileName = "../view/frontend/View" . $name . ".php";


    }

    public function Generate($datas)
    {
        $content = $this->generateFile($this->fileName, $datas);
        $view = $this->generateFile('../view/frontend/layout.php',
            array(
                'title' => $this->title,
                'header' => $this->header,
                'subheader' => $this->subheader,
                'button' => $this->button,
                'content' => $content
            ));

        echo $view;
    }

    private function generateFile($file, $datas)
    {

        if (file_exists($file)) {

            extract($datas);


            ob_start();

            require $file;

            return ob_get_clean();

        } else {
            echo "Fichier '$file introuvable";
        }
    }

    private function clean($data)
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8', false);
    }


}