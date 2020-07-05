<?php $this->title = 'Administration'; ?>

<h2 class="page_title">Espace d'administration</h2>

<p class="admin-msg"><?= $this->session->show('add_post'); ?></p> <!-- Le nouveau chapitre a bien été ajouté -->
<pc class="admin-msg"><?= $this->session->show('edit_post'); ?></p>  <!-- Le chapitre a bien été modifié -->
<p class="admin-msg"><?= $this->session->show('delete_post'); ?></p> <!-- Le chapitre a bien été supprimé -->
<p class="admin-msg"><?= $this->session->show('deleteFlag'); ?></p>  <!-- Le commentaire a été autorisé -->
<p class="admin-msg"><?= $this->session->show('delete_comment'); ?></p> <!-- Le commentaire a été supprimé -->

<section id="admin_body">

    <p class="fas fa-feather-alt"><a id="add-new-post" href="../public/index.php?route=addPost"> Ajouter un nouveau chapitre</a></p>

    <h4>Billets</h4>

    <table id="posts-table">
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
                <td><?= substr(($post->getContent()), 0, 240); ?></td>
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

    <!-- <div class="filter">
        <form action="" method="post">
            <h5>Filtrer les commentaires affichés ci-dessous</h5>
            <label><input type="radio" name="status" value="0">Autorisé</label>
            <label><input type="radio" name="status" value="1" checked>Signalé</label>
            <label><input type="radio" name="status" value="2">Refusé</label>
            <input type="submit" value="Filtrer" />
        </form>
    </div> -->

    <h4>Commentaires signalés</h4>
    <table id="comments-table">
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

    <h4>Utilisateurs</h4>
    <table id="users-table">
        <thead>
            <tr>
                <th id="U1">Id</th>
                <th id="U2">Pseudo</th>
                <th id="U3">Rôle</th>
                <th id="U4">Date création</th>
            </tr>
        </thead>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= htmlspecialchars($user->getId()); ?></td>
                <td><?= htmlspecialchars($user->getPseudo()); ?></td>
                <td><?= htmlspecialchars($user->getRole()); ?></td>
                <td><?= htmlspecialchars($user->getCreated_date()); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</section>
