<?php ob_start(); ?>

<p>Accueil - Hello World!</p>

<?php
    $content = ob_get_clean();
    $title = "Bienvenue sur Game-X";
    require_once 'base.html.php';
?>