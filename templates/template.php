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
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-expand-sm navbar-fixed-top">
            <p class="navbar-brand">Jean FORTEROCHE</p>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="../public/index.php"><span class="fa fa-home"></span> Accueil</a></li>
                <li class="nav-item"><a href="#"><span class="fa fa-book"></span> Billets</a></li>
                <li class="nav-item"><a href="../public/index.php?route=administration"><span class="fa fa-wrench"></span> Admin</a></li>
            </ul>
        </nav>
    </header>
    <div id="content" class="main">
        <?= $content ?>
    </div>
</body>

</html>