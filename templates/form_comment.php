<?php
$route = isset($form_post) && $form_post->get('id') ? 'editComment' : 'addComment';  // Checks if the route contains a post id. If so => edit comment
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour'; //adapts text displayed on button depending on route
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>&postId=<?= htmlspecialchars($post->getId()); ?>">
    <label for="author">Pseudo</label><br>
    <input type="text" id="author" name="author" value="<?= isset($form_post) ? htmlspecialchars($form_post->get('author')) : ''; ?>"><br>
    <?= isset($errors['author']) ? $errors['author'] : ''; ?>

    <label for="comment">Message</label><br>
    <textarea id="comment" name="comment"><?= isset($form_post) ? htmlspecialchars($form_post->get('comment')) : ''; ?></textarea><br>
    <?= isset($errors['comment']) ? $errors['comment'] : ''; ?>

    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit"> <!-- Text displayed in the button will changed depending on route -->
</form>