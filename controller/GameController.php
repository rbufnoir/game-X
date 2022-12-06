<?php
require_once './model/GameManager.php';

class GameController {
    private $gameManager;

    public function __construct() {
        $this->gameManager = new GameManager();
        $this->gameManager->loadGames();
    }

    public function displayGames() {
        $games = $this->gameManager->getGames();
        require_once 'view/games.view.php';
    }
}

