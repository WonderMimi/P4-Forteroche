<?php $this->title = "Billet"; ?>

<div>
    <h2 class="page_title">Chapitre</h2>

    <div class="card">
        <h3 class="card-header card-title"><?= ($post->getTitle()); ?></h3>
        <div class="card-body">
            <p class="card-text"><?= ($post->getContent()); ?></p>
        </div>
        <p class="author"><?= ($post->getAuthor()); ?></p>
        <p class="creation">Créé le : <?= ($post->getCreated_date()); ?></p>
    </div>

    <?= $this->session->show('add_comment'); ?>
    <?= $this->session->show('flag_comment'); ?>
    <br>

    <div id="comments">
        <h3>Ajouter un commentaire</h3>
        <?php include('form_comment.php'); ?>

        <h4>Commentaires</h4>
        <?php
        foreach ($comments as $comment) {
        ?>
            <h5><?= htmlspecialchars($comment->getAuthor()); ?></h5>
            <p><?= htmlspecialchars($comment->getComment()); ?></p>
            <p>Posté le <?= htmlspecialchars($comment->getCreated_date()); ?></p>
            <?php
            if ($comment->isFlagged()) {
            ?>
                <p>Ce commentaire a déjà été signalé</p>
            <?php
            } else {
            ?>
                <p><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
            }
        }
        ?>
    </div>
</div>
