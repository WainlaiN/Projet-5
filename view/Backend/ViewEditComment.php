
<h1>Editer le commentaire</h1>
<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>



<h2>Editer le commentaire</h2>
<div class="container">
    <form action="index.php?action=editComment&amp;id=<?= $affectedLine->getId() ?>" method="post">
        <div>
            <label for="postId">Article numero</label> :<br/>
            <input type="text" id="postId" name="postId" value="<?= $affectedLine->getPostId() ?>" readonly="readonly"/>
        </div>
        <div>
            <label for="author">Auteur</label><br/>
            <input type="text" id="author" name="author" value="<?= $affectedLine->getAuthor() ?>"/>
        </div>
        <div>
            <label for="comment">Commentaire</label><br/>
            <textarea id="comment" name="comment"><?= $affectedLine->getComment() ?></textarea>
        </div>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>
</div>


