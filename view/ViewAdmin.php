<?php $this->title = 'Mon blog';
//var_dump($datas);?>

<h1>Administration</h1>
<p>Derniers billets du blog :</p>

<div class="container">
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Editer</th>
        <th>Supprimer</th>
        </thead>
        <tbody>
        <?php foreach ($datas as $data): ?>
            <tr>
                <td><?= $data->getId() ?></td>
                <td><?= $this->clean($data->getTitle()); ?></td>
                <td><?= $data->getDateCreation(); ?></td>
                <td>
                    <a href="post/<?= $data->getId() ?>" style="color:white" class="btn btn-primary">Editer</a>
                </td>
                <td>
                    <a href="post/<?= $data->getId() ?>" style="color:white" class="btn btn-danger"
                    onclick="return confirm('Voulez vous vraiment supprimer ?)">Supprimer</a>

                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
