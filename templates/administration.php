<?php $this->title = 'Administration'; ?>

<h2 class="page_title">Espace d'administration</h2>

<?= $this->session->show('add_post'); ?>
<?= $this->session->show('edit_post'); ?>
<?= $this->session->show('delete_post'); ?>
<?= $this->session->show('deleteFlag'); ?>
<?= $this->session->show('delete_comment'); ?>
<section id="admin_body">

    <a href="../public/index.php?route=addPost">Ajouter un nouveau billet</a>

    <h4>Billets</h4>

    <table>
        <thead>
            <tr>
                <th id="B1">Id</th>
                <th id="B2">Titre</th>
                <th id="B3">Contenu</th>
                <th id="B4">Auteur</th>
                <th id="B5">Date création</th>
                <th id="B6">Actions</th>
            </tr>
        </thead>
        <?php
        foreach ($posts as $post) {
        ?>
            <tr>
                <td><?= htmlspecialchars($post->getId()); ?></td>
                <td><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></td>
                <td><?= substr(($post->getContent()), 0, 100); ?></td>
                <td><?= ($post->getAuthor()); ?></td>
                <td><?= htmlspecialchars($post->getCreated_date()); ?></td>
                <td>
                    <a href="../public/index.php?route=editPost&postId=<?= $post->getId(); ?>">Modifier</a>
                    <a href="../public/index.php?route=deletePost&postId=<?= $post->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <div class="filter">
        <form action="" method="post">
            <h5>Filtrer les commentaires affichés ci-dessous</h5>
            <label><input type="radio" name="status" value="0">Autorisé</label>
            <label><input type="radio" name="status" value="1" checked>Signalé</label>
            <label><input type="radio" name="status" value="2">Refusé</label>
            <input type="submit" value="Filtrer" />
        </form>
    </div>

    <h4>Commentaires signalés</h4>
    <table>
        <thead>
            <tr>
                <th id="C1">Id</th>
                <th id="C2">Pseudo</th>
                <th id="C3">Commentaire</th>
                <th id="C4">Date création</th>
                <th id="C5">Actions</th>
            </tr>
        </thead>
        <?php
        foreach ($comments as $comment) {
        ?>
            <tr>
                <td><?= htmlspecialchars($comment->getId()); ?></td>
                <td><?= htmlspecialchars($comment->getAuthor()); ?></td>
                <td><?= substr(htmlspecialchars($comment->getComment()), 0, 150); ?></td>
                <td><?= htmlspecialchars($comment->getCreated_date()); ?></td>
                <td>
                    <a href="../public/index.php?route=deleteFlag&commentId=<?= $comment->getId(); ?>">Valider</a>
                    <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Refuser</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</section>
