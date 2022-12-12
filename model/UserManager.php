<?php
require_once 'Manager.php';
require_once 'User.php';

class UserManager extends Manager {
    private $user;

    public function getUser() {
        return $this->user;
    }

    public function getUserByName($username) {
        $req = $this->returnQuery("SELECT * FROM users WHERE username='".$username."';");

        $this->user = new User($req[0]['username'], $req[0]['password'], $req[0]['mail']);
    }

    public function newUserDb($username, $password, $mail) {
        $req = "INSERT INTO users (username, password, mail) VALUES (:username, :password, :mail);";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $result = $statement->execute();

        $statement->closeCursor();

        if ($result)
            echo 'Vous êtes inscrit!';
    }
}