<?php dump($datas, $_SERVER['REDIRECT_URL']) ?>

<div class="row justify-content-center">
    <h1>Administration</h1>
</div>
<div class="row">
    <p>Liste des Commentaires</p>
</div>

<?php if ($datas == false) : ?>
    <div class="alert alert-secondary" role="alert">
        Pas de commentaires pour cet Article
    </div>
<?php else  : ?>
<div class="row">
    <table class="table table-striped">
        <thead>
        <th>Auteur</th>
        <th>Commentaire</th>
        <th>Valider</th>
        <th>Supprimer</th>
        </thead>
        <tbody>
        <?php if (is_object($datas)) : ?>
            <tr>
                <td><?= $datas->getAuthor() ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php elseif (is_array($datas)) : ?>
            <?php foreach ($datas as $data): ?>
                <tr>
                    <td><?= $data->getAuthor() ?></td>
                    <td><?= $data->getComment() ?></td>
                    <td><?= $data->isValid() ?></td>
                    <td><a href="/admin/comment/delete/<?= $data->getId() ?>" style="color:white" class="btn btn-danger"
                           onclick="return confirm('Voulez vous vraiment supprimer ?)">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif ?>
        <?php endif ?>


        </tbody>
    </table>

