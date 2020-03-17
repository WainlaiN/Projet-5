<?php

namespace App\Manager;

use App\Core\Database;
use App\Model\Post;

/**
 * PostManager Queries for Posts
 */
class PostManager extends Database
{

    /**
     * Return All Posts
     *
     * @return array
     */
    public function getPosts()
    {
        $posts = 'SELECT post_id, title, chapo, description, author_id, users.username, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, DATE_FORMAT(date_update, \'%d/%m/%Y\') AS date_update 
        FROM posts INNER JOIN users ON posts.author_id = users.user_id ORDER BY date_creation DESC';
        $result = $this->sql($posts);
        $custom_array = [];

        while ($datas = $result->fetch(\PDO::FETCH_ASSOC)) {
            array_push($custom_array, New Post($datas));
        }

        return $custom_array;

    }

    /**
     * Return one Post from ID
     *
     * @param $postId
     * @return mixed
     */
    public function getPost($postId)
    {
        $post = 'SELECT post_id, title, chapo, description, author_id, users.username, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, DATE_FORMAT(date_update, \'%d/%m/%Y\') AS date_update 
                FROM posts INNER JOIN users ON posts.author_id = users.user_id WHERE post_id= :postId';
        $parameters = [':postId' => $postId];
        $result = $this->sql($post, $parameters);
        $data = $result->fetch(\PDO::FETCH_ASSOC);

        return new Post($data);


    }

    /**
     * Add a Post
     *
     * @param $post
     * @return bool|false|\PDOStatement
     */
    public function addPost($post)
    {
        $newPost = 'INSERT INTO posts( title, chapo, description, date_creation, date_update, author_id) VALUES (:title, :chapo, :description, NOW(),NOW(), :author_id)';
        $parameters = [
            ':title' => $post['title'],
            ':chapo' => $post['chapo'],
            ':description' => $post['description'],
            ':author_id' => $post['author_id'],

        ];

        $this->sql($newPost, $parameters);
        //return $result;

    }

    /**
     * Delete a Post
     *
     * @param $postId
     * @return bool|false|\PDOStatement
     */
    public function deletePost($postId)
    {
        $post = 'DELETE FROM posts WHERE post_id= :id';
        $parameters = [':id' => $postId];
        $this->sql($post, $parameters);

    }

    /**
     * Update a Post
     *
     * @param $postId
     * @return bool|false|\PDOStatement
     */
    public function updatePost($postId, $datas)
    {
        $editedPost = 'UPDATE posts SET author_id=:author, title=:title, chapo=:chapo, description=:description, date_update=NOW() WHERE post_id=:id';
        $parameters = [
            ':id' => $postId,
            ':author' => $datas['authorid'],
            ':title' => $datas['title'],
            ':chapo' => $datas['chapo'],
            ':description' => $datas['description'],

        ];

        $this->sql($editedPost, $parameters);

    }
}
