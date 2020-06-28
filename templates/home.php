<?php $this->title = "Accueil"; ?>

<figure class="row alaska mb-0">
    <img src="../public/img/alaska.jpg"></img>
    <figcaption>
        <h1>Billet simple pour l'Alaska</h1>
        <p id="subtitle">Un roman de Jean Forteroche</p>
        <a href="#billets" class="arrow">0</a>
    </figcaption>
</figure>

<div class="separator" id="billets"></div>
<section>

    <?= $this->session->show('register'); ?>
    <?= $this->session->show('login'); ?>


    <h2 class="page_title">Mes 5 derniers billets</h2>
    <?php
    foreach ($posts as $post) {
    ?>

        <div class="card">
            <h2 class="card-header"><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h2>
            <div class="card-body">
                <p><?= ($post->getContent()); ?></p>
            </div>
            <p class="author"><?= ($post->getAuthor()); ?></p>
            <p class="creation">Créé le : <?= ($post->getCreated_date()); ?></p>
        </div>

    <?php
    }
    ?>
</section>