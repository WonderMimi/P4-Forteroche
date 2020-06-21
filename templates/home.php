<?php $this->title = "Accueil"; ?>

<figure class="row alaska mb-0">
    <img src="../public/img/alaska.jpg"></img>
    <figcaption>
        <h1>Billet simple pour l'Alaska</h1>
        <a href="#billets" class="arrow">0</a>
    </figcaption>
</figure>

<div>


    <?= $this->session->show('delete_comment'); ?>


    <h2 id="billets" class="page_title">Mes 5 derniers billets</h2>
    <?php
    foreach ($posts as $post) {
    ?>

        <div class="card">
            <h2 class="card-header"><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h2>
            <div class="card-body">
                <p><?= htmlspecialchars($post->getContent()); ?></p>
            </div>
            <p class="author"><?= htmlspecialchars($post->getAuthor()); ?></p>
            <p class="creation">Créé le : <?= htmlspecialchars($post->getCreated_date()); ?></p>
        </div>

    <?php
    }
    ?>
</div>