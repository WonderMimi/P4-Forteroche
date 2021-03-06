<?php $this->title = "Roman"; ?>

<h2 class="page_title">Tous les chapitres</h2>

<?php
foreach ($posts as $post) {
?>

    <div class="card">
        <h2 class="card-header"><a class="card-title" href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h2>
        <div class="card-body">
            <p><?= ($post->getContent()); ?></p>
        </div>
        <p class="author"><?= htmlspecialchars($post->getAuthor()); ?></p>
        <p class="creation">Créé le : <?= htmlspecialchars($post->getCreated_date()); ?></p>
    </div>

<?php
}
?>

<button onclick="topFunction()" id="GoToTopBtn" class="fas fa-chevron-up"></button>
<script src="..\public\js\script.js"></script>
