<?php
require 'Database.php';
require 'Post.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Billet</title>
</head>

<body>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <?php
    $post = new Post();
    $posts = $post->getPost($_GET['postId']);
    $post = $posts->fetch()
    ?>
    <div>
        <h2><?= htmlspecialchars($post->title);?></h2>
        <p><?= htmlspecialchars($post->content);?></p>
        <p><?= htmlspecialchars($post->author);?></p>
        <p>Créé le : <?= htmlspecialchars($post->created_date);?></p>
    </div>
    <br>
    <?php
    $posts->closeCursor();
    ?>

    <a href="home.php">Retour à l'accueil</a>
</div>
</body>
</html>
