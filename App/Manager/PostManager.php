<?php

namespace App\Manager;

use App\Model\Post;
use App\Core\Model;

/**
 * Class PostManager
 * @package App\Manager
 */
class PostManager extends Model
{


    protected $model = Post::class;
    protected $table_name = 'posts';

    public function addPost($post)
    {
        $newPost = 'INSERT INTO ' . $this->table_name . '( title, chapo, description, author, date_creation) VALUES (
            
        "' . $post['title'] . '", 
        "' . $post['chapo'] . '",
        "' . $post['description'] . '",
        "' . $post['author'] . '",
          NOW());';
        return $model = $this->custom_query($newPost);
    }

    public function getPosts()
    {
        return $model = $this->all();
    }

    public function getPost($id)
    {
        return $model = $this->get($id);
    }


    public function deletePost($id)
    {
        return $this->delete($id);
    }

    public function updatePost($id)
    {
        $editedPost = 'UPDATE ' . $this->table_name . ' SET author="' . $_POST["author"] . '", title="' . $_POST["title"] . '", chapo="' . $_POST["chapo"] . '", description="' . $_POST["description"] . '", date_update=NOW() WHERE id=' . $id;
        return $model = $this->custom_query($editedPost);
    }


}
