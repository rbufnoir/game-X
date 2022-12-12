<?php 
ob_start();
?>

<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Nombre de joueurs</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>    
        <tr class="game">
            <td><?= $game->getTitle(); ?></td>
            <td><?= $game->getNbPlayers(); ?></td>
            <td><a href="<?= URL ?>games/edit/<?= $game->getId(); ?>"><i class="fas fa-edit"></a></td>
            <td><a href="<?= URL ?>games/delete/<?= $game->getId(); ?>"><i class="fas fa-trash"></a></td>
        </tr>
    </tbody>
</table>

<?php
    $content = ob_get_clean();
    $title = $game->getTitle();
    require_once 'base.html.php';

?>