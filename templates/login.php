<?php $this->title = "Connexion"; ?>
<h2 class="page_title">CONNEXION</h2>

<p class="red-msg"><?= $this->session->show('error_login'); ?></p> <!-- Le pseudo ou le mot de passe sont incorrects -->
<p class="red-msg"><?= $this->session->show('need_login'); ?></p> <!-- Vous devez vous connecter pour accéder à cette page -->
<p class="red-msg"><?= $this->session->show('not_admin'); ?></p> <!-- Vous devez être administrateur pour accéder à cette page -->


<div id="login">
    <form id="login-form" method="post" action="../public/index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" autofocus><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
</div>
