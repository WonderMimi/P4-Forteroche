<?php
require '../vendor/autoload.php';

use P4\src\manager\PostManager;
use P4\src\manager\CommentManager;

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
    $post = new PostManager();
    $posts = $post->getPost($_GET['postId']);
    $post = $posts->fetch()
    ?>

    <div>
        <h2><?= htmlspecialchars($post->title);?></h2>
        <p><?= htmlspecialchars($post->content);?></p>
        <p><?= htmlspecialchars($post->author);?></p>
        <p>Créé le : <?= htmlspecialchars($post->created_date);?></p>
    </div>
    <hr>
    <br>

    <?php
    $posts->closeCursor();
    ?>

    <a href="home.php">Retour à l'accueil</a>

    <div id="comments" class="text-left" style="margin-left: 50px">
        <h3>Commentaires</h3>
        <?php
        $comment = new CommentManager();
        $comments = $comment->getCommentsFromPost($_GET['postId']);
        while($comment = $comments->fetch())
        {
            ?>
            <h4><?= htmlspecialchars($comment->author);?></h4>
            <p><?= htmlspecialchars($comment->comment);?></p>
            <p>Posté le <?= htmlspecialchars($comment->created_date);?></p>
            <?php
        }
        $comments->closeCursor();
        ?>
    </div>
</div>
</body>
</html>
