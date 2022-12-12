<?php

require_once 'Manager.php';
require_once 'User.php';

class UserManager extends Manager {

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