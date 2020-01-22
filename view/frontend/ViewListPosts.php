<?php $this->title = 'Mon blog';
//var_dump($datas);?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php foreach ($datas as $data): ?>

    <div class="container">
        <div class="news">
            <h3>
                <?= $this->clean($data->getTitle()); ?>
                <em>le <?= $data->date_creation; ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($data->getChapo())); ?>
                <br/>
                <?= nl2br(htmlspecialchars($data->getDescription())); ?>
                <br/>
                <em><a href="./index.php?action=post&amp;id=<?= $data->getId() ?>">Commentaires</a></em>
            </p>
        </div>
    </div>
<?php endforeach;




