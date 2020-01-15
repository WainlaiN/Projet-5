<?php $title = $post->getTitle() ?>

<?php ob_start(); ?>
<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

<div class="container">
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->getTitle()) ?>
            <em>le <?= $post->getDateCreation() ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post->getDescription())) ?>
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

    <?php if (!is_array($comments)) : ?>
        <p><strong><?= htmlspecialchars($comments->getAuthor()) ?></strong> le <?= $comments->getCommentDate() ?></p>
        <p><?= nl2br(htmlspecialchars($comments->getComment())) ?><a
                    href="index.php?action=getComment&amp;commentId=<?= $comments->getId() ?>"> Modifier</a></p>

    <?php else : ?>
        <?php foreach ($comments as $comment) : ?>
            <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate() ?></p>
            <p><?= nl2br(htmlspecialchars($comment->getComment())) ?><a
                        href="index.php?action=getComment&amp;commentId=<?= $comment->id ?>"> Modifier</a></p>
        <?php endforeach ?>
    <?php endif ?>
</div>

<?php $content = ob_get_clean() ?>
<?php require('template.php') ?>



