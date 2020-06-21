<?php $this->title = 'Administration'; ?>

<h2 class="page_title">Espace d'administration</h2>

<?= $this->session->show('add_post'); ?>
<?= $this->session->show('edit_post'); ?>
<?= $this->session->show('delete_post'); ?>
<?= $this->session->show('deleteFlag'); ?>
<?= $this->session->show('delete_comment'); ?>

<a href="../public/index.php?route=addPost">Ajouter un nouveau billet</a>

<h4>Billets</h4>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Auteur</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <?php
    foreach ($posts as $post) {
    ?>
        <tr>
            <td><?= htmlspecialchars($post->getId()); ?></td>
            <td><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></td>
            <td><?= substr(htmlspecialchars($post->getContent()), 0, 150); ?></td>
            <td><?= htmlspecialchars($post->getAuthor()); ?></td>
            <td>Créé le : <?= htmlspecialchars($post->getCreated_date()); ?></td>
            <td>
                <a href="../public/index.php?route=editPost&postId=<?= $post->getId(); ?>">Modifier le billet</a>
                <a href="../public/index.php?route=deletePost&postId=<?= $post->getId(); ?>">Supprimer le billet</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>


<h4>Commentaires signalés</h4>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Pseudo</th>
            <th>Commentaire</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <?php
    foreach ($comments as $comment) {
    ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId()); ?></td>
            <td><?= htmlspecialchars($comment->getAuthor()); ?></td>
            <td><?= substr(htmlspecialchars($comment->getComment()), 0, 150); ?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreated_date()); ?></td>
            <td>
                <a href="../public/index.php?route=deleteFlag&commentId=<?= $comment->getId(); ?>">Supprimer le flag</a>
                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>