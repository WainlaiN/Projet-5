<?php $this->title = 'Admin';
//dump($datas);?>

<div class="row justify-content-center">
    <h1>Administration</h1>
</div>
<div class="row">
    <p>Derniers billets du blog :</p>
</div>

<div class="row">
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Editer</th>
        <th>Voir les commentaires</th>
        <th>Supprimer</th>
        </thead>
        <tbody>
        <?php foreach ($datas as $data): ?>
            <tr>
                <td><?= $data->getId() ?></td>
                <td><?= $this->clean($data->getTitle()); ?></td>
                <td><?= $data->getDateCreation(); ?></td>
                <td>
                    <a href="/admin/post/<?= $data->getId() ?>" style="color:white" class="btn btn-primary">Editer</a>
                </td>
                <td>
                    <a href="/admin/comments/<?= $data->getId() ?>" style="color:white" class="btn btn-primary">Commentaires</a>
                </td>
                <td>
                    <a href="/admin/post/delete/<?= $data->getId() ?>" style="color:white" class="btn btn-danger"
                       onclick="return confirm('Voulez vous vraiment supprimer ?)">Supprimer</a>

                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="row py-3">
        <a href="/admin/add" style="color:white" class="btn btn-primary">Ajouter un Article</a>
    </div>
</div>
