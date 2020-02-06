<?php dump($datas) ?>

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
        <th>Article</th>
        <th>Auteur</th>
        <th>Commentaire</th>
        <th>Valider</th>
        <th>Supprimer</th>
        </thead>
        <tbody>
        <?php if (is_object($datas)) : ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php elseif (is_array($datas)) : ?>
            <?php foreach ($datas as $data): ?>
                <tr>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        <?php endif ?>
        <?php endif ?>


        </tbody>
    </table>

    <!--<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Commentaires Récents</h3>
            </div
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                    <?php if (is_object($datas)) : ?>
                        <div class="comment-body">
                            <div class="text">
                                <?= $this->clean($datas->getComment()) ?>
                                <p><strong><?= $this->clean($datas->getAuthor()) ?></strong>
                                    le <?= $this->clean($datas->getCommentDate()) ?></p>
                                <a href="../../public/index.php?action=editComment&amp;commentId=<?= $datas->getId() ?>">
                                    Modifier</a>
                            </div>
                        </div>
                    <?php elseif (is_array($datas)) : ?>
                    <?php foreach ($datas

                                   as $data) : ?>
                    <div class="comment-body">
                        <div class="text">
                            <p><strong><?= $this->clean($data->getAuthor()) ?></strong>
                                le <?= $this->clean($data->getCommentDate()) ?>
                            </p>
                            <p><?= $this->clean($data->getComment()) ?><a
                                        href="../../public/index.php?action=editComment&amp;commentId=<?= $data->getId() ?>">
                                    Supprimer</a></p>
                            <?php endforeach ?>
                            <?php else : ?>
                                <div class="alert alert-secondary" role="alert">
                                    Pas de commentaires pour cet Article
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </article>
            </section>
        </div>
