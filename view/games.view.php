<?php 
ob_start();
?>

<p>Games - Notre sélection</p>

<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Nombre de joueurs</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($games as $game): ?>
    
        <tr class="game">
            <td><?= $game->getTitle(); ?></td>
            <td><?= $game->getNbPlayers(); ?></td>
            <td><a href="<?= URL ?>games/edit/<?= $game->getId(); ?>"><i class="fas fa-edit"></a></td>
            <td><a href="<?= URL ?>games/delete/<?= $game->getId(); ?>"><i class="fas fa-trash"></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= URL ?>games/add" class="btn btn-success w-25 d-block m-auto">Ajouter un jeu</a>

<?php
    $content = ob_get_clean();
    $title = "Liste de jeux";
    require_once 'base.html.php';

?>