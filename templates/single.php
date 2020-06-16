<?php $this->title = "Billet"; ?>

<div>
    <h2 class="page_title">Mes billets</h2>

    <div class="card">
        <h3 class="card-header"><?= htmlspecialchars($post->getTitle());?></h3>
        <div class="card-body">
            <p class="card-text"><?= htmlspecialchars($post->getContent());?></p>
        </div>
        <p class="author"><?= htmlspecialchars($post->getAuthor());?></p>
        <p class="creation">Créé le : <?= htmlspecialchars($post->getCreated_date());?></p>
    </div>
    <div class="actions">
        <a href="../public/index.php?route=editPost&postId=<?= $post->getId(); ?>">Modifier</a>
    </div>

    <br>

    <div id="comments">
        <h4>Commentaires</h4>
        <?php
        foreach($comments as $comment)
        {
            ?>
            <h5><?= htmlspecialchars($comment->getAuthor());?></h5>
            <p><?= htmlspecialchars($comment->getComment());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getCreated_date());?></p>
            <?php
        }
        ?>
    </div>
</div>
