
<?php foreach (\App\Table\Article::getLast() as $post): ?>

    <?//php var_dump($post); ?>

    <h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

    <p><?= $post->extract; ?></p>



    <?php endforeach; ?>


