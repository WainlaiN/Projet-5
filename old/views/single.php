<?php

use App\App;

$post = App::getDb()->prepare('SELECT * FROM post WHERE id=?', [$_GET['id']], 'App\Table\Article', true );

App::setTitle($post->getTitle());
?>

<h1><?= $post->getTitle(); ?></h1>


<p><?= $post->getDescription(); ?></p>

