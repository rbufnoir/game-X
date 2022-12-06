<?php

require_once 'Manager.php';
require_once 'Game.php';

class GameManager extends Manager {
    private $games;

    public function addGame(Game $game) {
        $this->games[] = $game;
    }

    public function getGames() {
        return $this->games;
    }

    public function loadGames() {
        $myGames = $this->returnQuery("SELECT * FROM games");
        
        foreach($myGames as $game) {
            $g = new Game($game['id'], $game['title'], $game['nb_players']);
            $this->addGame($g);
        }
    }
}