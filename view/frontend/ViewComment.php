<?php
//var_dump($datas);

?>

<div class="container">
    <h2>Commentaires</h2>
    <section class="comments">
        <article class="comment">
            <?php if (is_object($datas)) : ?>
                <div class="comment-body">
                    <div class="text">
                        <?= $this->clean($datas->getComment()) ?>
                        <p><strong><?= $this->clean($datas->getAuthor()) ?></strong>
                            le <?= $this->clean($datas->getCommentDate()) ?></p>
                        <a href="index.php?action=editComment&amp;commentId=<?= $objects->getId() ?>"> Modifier</a></p>
                    </div>
                </div>
            <?php else : ?>
            <?php foreach ($datas as $data) : ?>
                <div class="comment-body">
                    <div class="text">
                        <?php //var_dump($data) ?>
                        <p><strong><?= $this->clean($data->author) ?></strong> le <?= $this->clean($data->comment_date) ?>
                        </p>
                        <p><?= $this->clean($data->comment) ?><a
                                    href="index.php?action=editComment&amp;commentId=<?= $data->id ?>"> Modifier</a></p>
                        <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
        </article>
    </section>
</div>
