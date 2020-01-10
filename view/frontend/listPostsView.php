<?php $title = 'Mon blog'; ?>
<?php //var_dump($posts); ?>
<?php ob_start();?>
    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>


<?php foreach ($posts as $post): ?>
    <div class="container">
        <div class="news">
            <h3>
                <?= htmlspecialchars($post->title); ?>
                <em>le <?= $post->date_creation; ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($post->chapo)); ?>
                <br/>
                <?= nl2br(htmlspecialchars($post->description)); ?>
                <br/>
                <em><a href="./index.php?action=post&amp;id=<?= $post->id ?>">Commentaires</a></em>
            </p>
        </div>
    </div>
    <?php endforeach;

$content = ob_get_clean();

require('template.php');


