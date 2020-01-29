<?php

namespace App\Manager;

use App\Entity\Post;
use App\Core\Model;

/**
 * Class PostManager
 * @package App\Manager
 */
class PostManager extends Model
{

    /**
     * @var string
     */
    protected $model = Post::class;
    /**
     * @var string
     */
    protected $table_name = 'post';


    /**
     * @return array|mixed|null
     */

    public function addPost($post)
    {
        $newPost = 'INSERT INTO ' . $this->table_name . '( title, chapo, description, author, date_creation) VALUES (
        
        "' . $post->getTitle() . '", 
        "' . $post->getChapo() . '",
        "' . $post->getDescription() . '",
        "' . $post->getAuthor() . '",
          NOW());';
        return $model = $this->custom_query($newPost);
    }


    public function getPosts()
    {
        return $model = $this->all();

    }

    /**
     * @param $id
     * @return array|mixed|null
     */
    public function getPost($id)
    {
        return $model = $this->get($id);
    }


    /**
     * @param $id
     * @return array|mixed|null
     */
    public function deletePost($id)
    {
        return $this->delete($id);
    }


    /**
     * @param $Id
     */
    public function editPost($id)
    {
        return $model = $this->get($id);

    }


}
