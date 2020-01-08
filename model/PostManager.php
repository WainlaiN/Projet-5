<?php
namespace App\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapo, description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM post ORDER BY date_creation DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapo, description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;

    }


}
