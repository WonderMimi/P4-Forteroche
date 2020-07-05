<?php $this->title = "Inscription"; ?>
<h2 class="page_title">INSCRIPTION</h2>

<div id="register">
    <form id="register-form" method="post" action="../public/index.php?route=register">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($form_post) ? htmlspecialchars($form_post->get('pseudo')) : ''; ?>" autofocus><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
</div>
