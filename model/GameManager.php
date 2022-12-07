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

    public function newGameDB($title, $nbPlayers) {
        $req = "INSERT INTO games (title, nb_players) VALUES (:title, :nbPlayers);";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':nbPlayers', $nbPlayers, PDO::PARAM_INT);
        $result = $statement->execute();

        $statement->closeCursor();

        if ($result)
            $this->loadGames();
    }

    public function editGameDB($id, $title, $nbPlayers) {
        $req = "UPDATE games SET title = :title, nb_players = :nbPlayers WHERE id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':nbPlayers', $nbPlayers, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();
        
        if ($result)
            $this->loadGames();
    }

    public function getGameById($id) {
        foreach ($this->games as $game) {
            if ($game->getId() == $id)
                return $game;
        }
    }

    public function deleteGame($id) {
        $req = "DELETE FROM games WHERE id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $game = $this->getGameById($id);
            unset($game);
        }
    }
}