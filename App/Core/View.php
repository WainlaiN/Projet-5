<?php

namespace App\Core;


class View
{
    protected $fileName;
    protected $filepath = '';
    private $layoutfilepath = '../view/';
    protected $title;


    public function __construct($name)
    {

        $this->fileName = $this->filepath . 'View' . $name . ".php";

    }

    public function generate($datas)
    {

        $content = $this->generateFile($this->fileName, $datas);
        $view = $this->generateFile($this->layoutfilepath . 'layout.php',
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
        if ($datas) {

            if (file_exists($file)) {

                if (!is_object($datas)) {

                    extract($datas);
                }

                ob_start();

                require $file;

                return ob_get_clean();
            }

        } else {
            ob_start();

            require $file;

            return ob_get_clean();
        }

    }


    public function clean($data)
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8', false);
    }


}