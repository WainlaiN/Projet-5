<?php $objects = (object)$datas[0];
var_dump($datas);
var_dump($objects);
 ?>

    <h2>Commentaires</h2>

<?php if (!is_array($objects)) : ?>
    <p><strong><?= $this->clean($objects->getAuthor()) ?></strong> le <?= $this->clean($objects->getCommentDate()) ?></p>
    <p><?= $this->clean($objects->getComment()) ?><a
                href="./index.php?action=getComment&amp;commentId=<?= $objects->getId() ?>"> Modifier</a></p>

<?php else : ?>
    <?php foreach ($objects as $key => $data) : ?>
        <?php //var_dump($data) ?>
        <p><strong><?= $this->clean($data->author) ?></strong> le <?= $this->clean($data->comment_date) ?></p>
        <p><?= $this->clean($data->comment) ?><a
                    href="index.php?action=getComment&amp;commentId=<?= $data->id ?>"> Modifier</a></p>
    <?php endforeach ?>
<?php endif ?>