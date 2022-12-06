<?php

abstract class Manager {
    private static $pdo;
    
    private static function setDb() {
        self::$pdo = new PDO("mysql:host=localhost;dbname=games;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getDB() {
        if (self::$pdo == null)
            self::setDb();
        return self::$pdo;
    }

    protected function returnQuery($query) {
        $req = $this->getDb()->prepare($query);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $data;
    }
}