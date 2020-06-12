<?php
require '..\config\Autoloader.php';

use P4\config\Autoloader;
use P4\src\manager\PostManager;

Autoloader::register();
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
        <p>Toujours en travaux</p>

        <?php
        $post = new PostManager();
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
