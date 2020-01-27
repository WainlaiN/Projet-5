<?php $this->title = 'Mon blog';
//var_dump($datas);?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php foreach ($datas as $data): ?>

    <div class="container">
        <div class="news">
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
<?php endforeach;




