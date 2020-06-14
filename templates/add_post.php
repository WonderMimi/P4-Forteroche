<?php $this->title = "Nouveau billet"; ?>
<h2 class="page_title">Ajouter un nouveau billet</h2>

<div>
    <form method="post" action="../public/index.php?route=addPost">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" placeholder="Saisissez le titre de ce nouveau billet"><br>
        <?= isset($errors['title']) ? $errors['title'] : ''; ?>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content" placeholder="Contenu de ce billet"></textarea><br>
        <?= isset($errors['content']) ? $errors['content'] : ''; ?>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author" placeholder="votre nom ou pseudo"><br>
        <?= isset($errors['author']) ? $errors['author'] : ''; ?>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
</div>
