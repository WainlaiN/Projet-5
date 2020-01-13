<?php

namespace App\Manager;

use App\Entity\Post;
use App\Core\Model;

class PostManager extends Model
{

    protected $model = Post::class;
    protected $table_name = 'post';

    public function getPosts()
    {
        return $this->all();
    }

    public function getPost($id)
    {
        return $this->get($id);
    }

    public function addPost()
    {

    }

    public function deletePost($id)
    {
        return $this->delete($id);
    }

    public function editPost($Id)
    {

    }


}
