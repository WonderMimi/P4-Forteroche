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
<section id="home-section">

    <p class="login-msg"><?= $this->session->show('register'); ?></p> <!-- Vous êtes maintenant inscrit(e) -->
    <p class="login-msg"><?= $this->session->show('login'); ?></p>  <!-- Content de vous revoir -->


    <h2 class="page_title">Mes 5 derniers chapitres</h2>
    <?php
    foreach ($posts as $post) {
    ?>

        <div class="card">
            <h2 class="card-header"><a class="card-title" href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h2>
            <div class="card-body">
                <p><?= substr($post->getContent(), 0, 800); ?></p>
            </div>
            <p class="author"><?= ($post->getAuthor()); ?></p>
            <p class="creation">Créé le : <?= ($post->getCreated_date()); ?></p>
        </div>

    <?php
    }
    ?>

    <button onclick="topFunction()" id="GoToTopBtn" class="fas fa-chevron-up"></button>
    <script src="..\public\js\script.js"></script>
</section>
