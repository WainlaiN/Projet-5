<?php $this->title = 'Mon blog';
//var_dump($datas);?>

    <h1>Administration</h1>
    <p>Derniers billets du blog :</p>


<?php foreach ($datas as $data): ?>

    <div class="container">
        <div class="row">
            <div class="article">
                <h3>
                    <?= $this->clean($data->getTitle()); ?>
                    <em>le <?= $data->getDateCreation(); ?></em>
                </h3>

                <p>
                    <?= $this->clean($data->getChapo()); ?>
                    <br/>
                    <?= $this->clean(substr($data->getDescription(), 0, 100)); ?>
                    <br/>
                    <em><a href="post/<?= $data->getId() ?>">Voir plus</a></em>
                </p>
            </div>
        </div>
        <div class="row">

                <div class="alert alert-danger" role="alert">
                    Editer
                </div>
                <div class="alert alert-danger" role="alert">
                    Supprimer
                </div>
                <div class="alert alert-danger" role="alert">
                    <a href="/admin/comments/<?= $data->getId() ?>"> Voir les commentaires</a></p>
                </div>

        </div>

    </div>
<?php endforeach;