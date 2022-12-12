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
            $this->gameManager->newGameDB(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['nbPlayers']));
            header('Location:'.URL.'games');
        }
    }

    public function editGameForm($id) {
        $game = $this->gameManager->getGameById($id);
        require_once 'view/edit.game.view.php';
    }

    public function editGameValidation() {
        if ($_POST['id-game'] != null && $_POST['title'] != null && $_POST['nbPlayers'] != null) {
            $this->gameManager->editGameDB($_POST['id-game'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['nbPlayers']));
            header('Location:'.URL.'games');
        }
    }

    public function deleteGame($id) {
        $this->gameManager->deleteGame($id);
        header('Location:'.URL.'games');
    }

    public function displayGame($id) {
        $game = $this->gameManager->getGameById($id);
        
        require_once 'view/game.view.php';
    }
    
    public function redirectGame($name) {
        $games = $this->gameManager->getGames($name);
        
        foreach($games as $game) {
            if ($game->getTitle() == $name) {
                header('Location:'.URL.'games/'. $game->getId());
                return ;
            }
        }
        require_once 'view/games.view.php';
    }
}
