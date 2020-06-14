<?php $this->title = "Accueil"; ?>

<header class="container">
    <nav class="navbar navbar-expand-sm navbar-fixed-top">
        <p class="navbar-brand">Jean FORTEROCHE</p>
        <ul class="navbar-nav">
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
    <a href="../public/index.php?route=addPost">Ajouter un nouveau billet</a>
    <?php
    foreach ($posts as $post)
    {
    ?>

    <div>
        <h2><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId());?>"><?= htmlspecialchars($post->getTitle());?></a></h2>
        <p><?= htmlspecialchars($post->getContent());?></p>
        <p><?= htmlspecialchars($post->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($post->getCreated_date());?></p>
    </div>

    <?php
    }
    ?>
</div>
