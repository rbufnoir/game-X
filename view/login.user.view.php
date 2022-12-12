<?php
    ob_start();
?>

<form method="POST" action="<?= URL ?>user/checkuserlogin">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="pasword">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <input type="hidden" name="id-game">
    <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
</form>

<?php
    $content = ob_get_clean();
    $title = "Connexion";
    require_once 'base.html.php';
?>