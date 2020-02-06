<?php
//dump($comment);

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
                        <a href="../../public/index.php?action=editComment&amp;commentId=<?= $datas->getId() ?>">
                            Modifier</a>
                    </div>
                </div>
            <?php elseif (is_array($datas)) : ?>
            <?php foreach ($datas as $data) : ?>
            <div class="comment-body">
                <div class="text">
                    <p><strong><?= $this->clean($data->getAuthor()) ?></strong>
                        le <?= $this->clean($data->getCommentDate()) ?>
                    </p>
                    <p><?= $this->clean($data->getComment()) ?><a
                                href="../../public/index.php?action=editComment&amp;commentId=<?= $data->getId() ?>">
                            Supprimer</a></p>
                    <?php endforeach ?>
                    <?php else : ?>
                        <div class="alert alert-secondary" role="alert">
                            Pas de commentaires pour cet Article
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </article>
    </section>
</div>
