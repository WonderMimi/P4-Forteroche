<?php
$route = isset($form_post) && $form_post->get('id') ? 'editComment' : 'addComment';  // Checks if the route contains a post id. If so => edit comment
?>

<form id="comment-form" method="post" action="../public/index.php?route=<?= $route; ?>&postId=<?= htmlspecialchars($post->getId()); ?>">
    <label for="author">Pseudo</label>
    <input type="text" id="author" name="author" value="<?= isset($form_post) ? htmlspecialchars($form_post->get('author')) : ''; ?>" ><br>
    <?= isset($errors['author']) ? $errors['author'] : ''; ?>

    <label for="comment">Message</label>
    <textarea id="comment" name="comment"><?= isset($form_post) ? htmlspecialchars($form_post->get('comment')) : ''; ?></textarea><br>
    <?= isset($errors['comment']) ? $errors['comment'] : ''; ?>

    <input type="submit" value="Valider" id="submit" name="submit">
</form>
