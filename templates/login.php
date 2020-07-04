<?php $this->title = "Connexion"; ?>
<h2 class="page_title">CONNEXION</h2>

<?= $this->session->show('error_login'); ?>

<div id="login">
    <form id="login-form" method="post" action="../public/index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
</div>
