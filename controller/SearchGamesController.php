<?php

require_once '../model/GameManager.php';

class SearchGamesController {
    private $gameManager;

    public function __construct() {
        $this->gameManager = new GameManager();
    }

    public function getAllGames() {
        $this->gameManager->loadGames();
        return $this->gameManager->getGames();
    }

    public function searchGames($s) {
        return array_column($this->gameManager->getGameByName($s), 'title');
    }
}