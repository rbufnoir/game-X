<?php

require_once 'controller/SearchGamesController.php';

$searchGamesController = new SearchGamesController();
$games = $searchGamesController->getAllGames();
$tab;

foreach($games as $game) {
    $tab[] = $game->getTitle();
}

echo json_encode($tab);