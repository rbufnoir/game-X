<?php
    ob_start();
?>

<form method="POST" action="<?= URL ?>user/registervalid">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="pasword">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="mail">Mail</label>
        <input type="mail" class="form-control" name="mail" id="mail">
    </div>
    <input type="hidden" name="id-game">
    <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
</form>

<?php
    $content = ob_get_clean();
    $title = "Inscription";
    require_once 'base.html.php';
?>