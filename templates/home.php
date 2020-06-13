<?php
require '../vendor/autoload.php';

use P4\src\manager\PostManager;

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Blog de Jean Forteroche sur l'Alaska">
    <meta name="author" content="Myriam Demaine">
    <link rel="icon" href="../public/img/favicon.ico">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Accueil</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-expand-sm navbar-fixed-top">
            <p class="navbar-brand">Jean FORTEROCHE</p>
            <ul class="navbar-nav">
                <!-- I add the 'active' class depending on page displayed -->
                <li class="nav-item"><a href="#"><span class="fa fa-home"></span> Accueil</a></li>
                <li class="nav-item"><a href="#"><span class="fa fa-book"></span> Billets</a></li>
            </ul>
        </nav>
    </header>
    <figure class="row alaska mb-0">
        <img src="../public/img/alaska.jpg"></img>
        <figcaption>
            <h1>Billet simple pour l'Alaska</h1>
        </figcaption>
    </figure>
    <div>
        <p>En construction</p>

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
