<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\Post;


/**
 * Class PostManager
 * @package App\Manager
 */
class PostManager extends Database
{


    private $model = Post::class;
    private $table_name = 'posts';


    public function getPosts()
    {
        $req = 'SELECT * FROM ' . $this->table_name;
        $result = $this->sql($req);
        while ($datas = $result->fetchObject($this->model)) {
            $custom_array[] = new $this->model($datas);
        }
        return $custom_array;

    }

    public function getPost($id)
    {
        $req = 'SELECT * FROM ' . $this->table_name . ' WHERE id=' . $id;
        $result = $this->sql($req);
        return $data = $result->fetchObject($this->model);

    }

    public function addPost($post)
    {
        $newPost = 'INSERT INTO ' . $this->table_name . '( title, chapo, description, author, date_creation) VALUES (
            
        "' . $post['title'] . '", 
        "' . $post['chapo'] . '",
        "' . $post['description'] . '",
        "' . $post['author'] . '",
          NOW());';
        return $model = $this->sql($newPost)->fetch();
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
