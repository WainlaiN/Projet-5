<?php $title = $post->title ?>

<?php ob_start(); ?>
<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

<div class="container">
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->title) ?>
            <em>le <?= $post->date_creation ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post->description)) ?>
        </p>
    </div>
</div>
<div class="container">
    <h2>Commentaires</h2>

    <form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br/>
            <input type="text" id="author" name="author"/>
        </div>
        <div>
            <label for="comment">Commentaire</label><br/>
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>

    <?php foreach ($comments as $comment) : ?>
        <?php //var_dump($comment); ?>

        <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate() ?></p>
        <p><?= nl2br(htmlspecialchars($comment->getComment())) ?><a
                    href="index.php?action=getComment&amp;commentId=<?= $comment->id ?>"> Modifier</a></p>

        <?php //ob_end_flush() ?>
    <?php endforeach; ?>
</div>

<?php $content = ob_get_clean() ?>
<?php require('template.php') ?>



