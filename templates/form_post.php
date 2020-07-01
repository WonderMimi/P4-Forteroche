<?php
$route = isset($form_post) && $form_post->get('id') ? 'editPost&postId=' . $form_post->get('id') : 'addPost';
$submit = $route === 'addPost' ? 'Envoyer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">

    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($form_post) ? htmlspecialchars($form_post->get('title')) : ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>

    <label for="content">Contenu</label><br>
    <textarea class="tiny_text" id="content" name="content"><?= isset($form_post) ? htmlspecialchars($form_post->get('content')) : ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>

    <label for="author">Auteur</label><br>
    <input type="text" id="author" name="author" value="<?= isset($form_post) ? htmlspecialchars($form_post->get('author')) : ''; ?>"><br>
    <?= isset($errors['author']) ? $errors['author'] : ''; ?>

    <input type="submit" value="<?= $submit ?>" id="submit" name="submit">
</form>
