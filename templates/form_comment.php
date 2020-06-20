<form method="post" action="../public/index.php?route=addComment&postId=<?= htmlspecialchars($post->getId()); ?>">
    <label for="author">Pseudo</label><br>
    <input type="text" id="author" name="author"><br>
    <label for="comment">Message</label><br>
    <textarea id="comment" name="comment"></textarea><br>
    <input type="submit" value="Ajouter" id="submit" name="submit">
</form>