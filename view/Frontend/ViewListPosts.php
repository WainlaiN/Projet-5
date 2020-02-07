<?php $this->title = 'Mon blog';
//dump($datas);?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<div class="container">
<?php foreach ($datas as $data): ?>


        <div class="news">
            <h3>
                <?= $this->clean($data->getTitle()); ?>
                <em>le <?= $this->clean($data->getDateCreation()); ?></em>
            </h3>

            <p>
                <?= $this->clean($data->getChapo()); ?>
                <br/>
                <?= $this->clean(substr($data->getDescription(), 0, 100)); ?>
                <br/>
                <em><a href="post/<?= $data->getId() ?>">Voir plus</a></em>
            </p>
        </div>

<?php endforeach; ?>
  </div>



