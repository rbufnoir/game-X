<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once 'controller/GameController.php';

$gameController = new GameController();

if (empty($_GET['page']))
require_once './view/home.view.php';
else {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    switch($url[0]) {
        case 'index' : require_once './view/home.view.php';
        break;
        case 'games' : 
            if (empty($url[1]))
                $gameController->displayGames();
            else if($url[1] == 'add')
                $gameController->newGameForm();
            else if($url[1] == 'gvalid')
                $gameController->newGameValidation();
            else if($url[1] == 'edit')
                echo 'edit';
            else if($url[1] == 'delete')
                echo 'delete';
        break;
    }
}