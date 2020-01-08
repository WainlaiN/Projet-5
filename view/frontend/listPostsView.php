<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>


<?php while ($data = $posts->fetch()) {
    ?>
    <div class="container">
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']); ?>
                <em>le <?= $data['date_creation_fr']; ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($data['chapo'])) ?>
                <br/>
                <?= nl2br(htmlspecialchars($data['description']));
                ?>
                <br/>
                <em><a href="./index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
    </div>
    <?php
}
$posts->closeCursor();

$content = ob_get_clean();

require('template.php');


