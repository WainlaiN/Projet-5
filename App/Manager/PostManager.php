<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\Post;


class PostManager extends Database
{


    private $model = Post::class;
    private $table_name = 'posts';


    public function getPosts()
    {
        $posts = 'SELECT id, title, chapo, description, author, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, DATE_FORMAT(date_update, \'%d/%m/%Y\') AS date_update FROM ' . $this->table_name . ' ORDER BY date_creation DESC';
        $result = $this->sql($posts);

        while ($datas = $result->fetchObject($this->model)) {
            $custom_array[] = new $this->model($datas);
        }
        return $custom_array;

    }

    public function getPost($id)
    {
        $post = 'SELECT id, title, chapo, description, author, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM ' . $this->table_name . ' WHERE id= :postId';
        $parameters = [':postId' => $id];
        $result = $this->sql($post, $parameters);
        return $result->fetchObject($this->model);

    }

    public function addPost($post)
    {
        $newPost = 'INSERT INTO ' . $this->table_name . '( title, chapo, description, author, date_creation) VALUES (
            
        "' . $post['title'] . '", 
        "' . $post['chapo'] . '",
        "' . $post['description'] . '",
        "' . $post['author'] . '",
          NOW());';
        $result = $this->sql($newPost);
        return $result;

    }


    public function deletePost($id)
    {
        $post = 'DELETE FROM ' . $this->table_name . ' WHERE id= :id';
        $parameters = [':id' => $id];
        $result = $this->sql($post, $parameters);
        return $result;
    }

    public function updatePost($id)
    {
        $editedPost = 'UPDATE ' . $this->table_name . ' SET author=:author, title=:title, chapo=:chapo, description=:description, date_update=NOW() WHERE id=:id';
        $parameters = [
            ':id' => $id,
            ':author' => $_POST['author'],
            ':title' => $_POST['title'],
            ':chapo' => $_POST['chapo'],
            ':description' => $_POST['description'],

        ];
        $result = $this->sql($editedPost, $parameters);
        return $result;
    }


}
