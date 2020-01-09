<?php

namespace App\Model;

require_once('model/Post.php');
require_once("model/Database.php");

class PostManager extends Database
{

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapo, description, author, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, date_update FROM post ORDER BY date_creation');
        while ($datas = $req->fetchObject(Post::class)) {
            $articles[] = new Post($datas);
        }
        $req->closeCursor();
        return $articles;
    }

    public function getPost($Id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapo, description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM post WHERE id = ?');
        $req->execute(array($Id));
        $post = $req->fetch();

        return $post;

    }

    public function addPost()
    {

    }

    public function deletePost($Id)
    {

    }

    public function editPost($Id)
    {

    }


}
