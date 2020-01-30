<?php //var_dump($datas);
$this->title = 'Mon Article ' . $this->clean($datas->getTitle());

?>

<p><a href="/posts">Retour à la liste des billets</a></p>

<div class="container">
    <div class="news">
        <h3>
            <?= $this->clean($datas->getTitle()) ?>
            <em>le <?= $this->clean($datas->getDateCreation()) ?></em>
        </h3>

        <p>
            <?= $this->clean($datas->getDescription()) ?>
        </p>
    </div>
</div>






