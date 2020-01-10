<?php

namespace App\Manager;

use App\Entity\Post;
use App\Core\Model;

class PostManager extends Model
{

    protected $model = Post::class;
    protected $table_name = 'posts';

    public function getPosts()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT id, title, chapo, description, author, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, date_update FROM post ORDER BY date_creation';
        return $this->custom_query($sql);
        return $this->all();
    }

    public function getPost($id)
    {
        $db = $this->dbConnect();
        $req = 'SELECT id, title, chapo, description, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM post WHERE id = ?';
        return $this->get($id);

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
