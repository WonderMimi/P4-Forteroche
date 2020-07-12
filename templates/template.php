<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Blog de Jean Forteroche sur l'Alaska">
    <meta name="author" content="Myriam Demaine">
    <link rel="icon" href="../public/img/favicon.ico">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/fwd4w95b06voxc42vvduvb3iqil5obksxjktlqu9l2supaav/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-expand-sm navbar-fixed-top">
            <p class="navbar-brand">Jean FORTEROCHE</p>

            <input type="checkbox" id="toggle-nav" aria-label="open/close navigation">
            <label for="toggle-nav" class="nav-button"></label>
                
            <ul class="navbar-nav">
                <li class="nav-item"><a href="../public/index.php"><span class="fa fa-home"></span> Accueil</a></li>
                <li class="nav-item"><a href="../public/index.php?route=book"><span class="fa fa-book"></span> Roman</a></li>

                <?php if ($this->session->get('pseudo')) { ?>

                    <li class="nav-item"><a href="../public/index.php?route=logout"><span class="fas fa-sign-out-alt"></span> Déconnexion</a></li>

                    <?php if ($this->session->get('groups') === 'admin') { ?>

                        <li class="nav-item"><a href="../public/index.php?route=administration"><span class="fa fa-wrench"> Admin</span></a></li>

                    <?php }
                } else {
                    ?>

                    <li class="nav-item"><a href="../public/index.php?route=register"><span class="fas fa-user"></span> Inscription</a></li>
                    <li class="nav-item"><a href="../public/index.php?route=login"><span class="fas fa-sign-in-alt"></span> Connexion</a></li>

                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <div id="content" class="main">
        <?= $content ?>
    </div>

<script src="..\public\js\script.js"></script>
</body>

</html>
