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

    <p class="green-msg"><?= $this->session->show('add_comment'); ?></p> <!-- Le nouveau commentaire a bien été ajouté -->
    <p class="green-msg"><?= $this->session->show('flag_comment'); ?></p> <!-- Le commentaire a bien été signalé -->
    <br>

    <div id="add-comments">
        <h3>Ajouter un commentaire</h3>
        <?php include('form_comment.php'); ?>
    </div>
    <div id=comments>
        <h4>Commentaires</h4>

            <?php
            foreach ($comments as $comment) {
            ?>
                <div id="single-comment">
                    <h5 id="pseudo"><?= htmlspecialchars($comment->getAuthor()); ?>
                    <span id="comment-date"> le <?= htmlspecialchars($comment->getCreated_date()); ?></span></h5>
                    <p><?= htmlspecialchars($comment->getComment()); ?></p>
                    <?php
                    if ($comment->isFlagged()) {
                    ?>
                        <p class="cmt-msg">Ce commentaire a déjà été signalé</p>
                    <?php
                    } else {
                    ?>
                        <p class="cmt-msg"><a id="signal" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
                </div>
                <?php
                }
            }
            ?>
        </div>

</div>
