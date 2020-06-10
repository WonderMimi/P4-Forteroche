<?php
require '..\src\manager\DatabaseManager.php';
require '..\src\manager\PostManager.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
</head>

<body>
    <div>
        <h1>Blog de Jean Forteroche</h1>
        <p>En construction</p>

        <?php
        $post = new \P4\src\manager\PostManager();
        $posts = $post->getPosts();
        while($post = $posts->fetch())
        {
        ?>

        <div>
            <h2><a href="single.php?postId=<?= htmlspecialchars($post->id);?>"><?= htmlspecialchars($post->title);?></a></h2>
            <p><?= htmlspecialchars($post->content);?></p>
            <p><?= htmlspecialchars($post->author);?></p>
            <p>Créé le : <?= htmlspecialchars($post->created_date);?></p>
        </div>
        <br>
        <?php
        }
        $posts->closeCursor();
        ?>
    </div>
</body>
</html>
