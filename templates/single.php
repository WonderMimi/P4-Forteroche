<?php $this->title = "Billet"; ?>

<div>
    <h1>Mes billets</h1>
    <p>En construction</p>

    <div>
        <h2><?= htmlspecialchars($post->getTitle());?></h2>
        <p><?= htmlspecialchars($post->getContent());?></p>
        <p><?= htmlspecialchars($post->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($post->getCreated_date());?></p>
    </div>

    <br>

    <a href="../public/index.php">Retour à l'accueil</a>

    <div id="comments" class="text-left" style="margin-left: 50px"> <!-- NOTE move to stylesheet -->
        <h3>Commentaires</h3>
        <?php
        foreach($comments as $comment)
        {
            ?>
            <h4><?= htmlspecialchars($comment->getAuthor());?></h4>
            <p><?= htmlspecialchars($comment->getComment());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getCreated_date());?></p>
            <?php
        }
        ?>
    </div>
</div>
