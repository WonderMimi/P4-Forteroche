<?php $this->title = "Accueil"; ?>

<figure class="row alaska mb-0">
    <img src="../public/img/alaska.jpg"></img>
    <figcaption>
        <h1>Billet simple pour l'Alaska</h1>
    </figcaption>
</figure>
<div>
    <?= $this->session->show('add_post'); ?>
    <a href="../public/index.php?route=addPost">Ajouter un nouveau billet</a>
    <?= $this->session->show('edit_post'); ?>

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
