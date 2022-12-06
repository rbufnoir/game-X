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

    public function newGameForm() {
        require_once "view/new.game.view.php";
    }

    public function newGameValidation() {
        if ($_POST['title'] != null && $_POST['nbPlayers'] != null) {
            $this->gameManager->newGameDB($_POST['title'], $_POST['nbPlayers']);
            header('Location:'.URL.'games');
        }
    }
}

