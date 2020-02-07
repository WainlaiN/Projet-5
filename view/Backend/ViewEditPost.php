<?php $this->title = 'Edition';?>
<h1>Editer l'article</h1>
<p><a href="/admin">Retour à la liste des billets</a></p>

<?php if (count($_POST) != 0) : ?>
<div class="alert alert-success" role="alert">
    Votre Article a été modifié !
</div>

<?php endif ?>

    <form action=""  method="post">

            <div class="form-group">
                <label for="author">Auteur</label><br/>
                <input type="text" id="author" name="author" value="<?= $datas->getAuthor() ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="author">Titre</label><br/>
                <input type="text" id="title" name="title" value="<?= $datas->getTitle() ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="author">Chapo</label><br/>
                <input type="text" id="chapo" name="chapo" value="<?= $datas->getChapo() ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="comment">Description</label><br/>
                <textarea id="description" name="description" rows="10" class="form-control"><?= $datas->getDescription() ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Modifier">
            </div>

    </form>

