<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once 'controller/GameController.php';
require_once 'controller/UserController.php';

$gameController = new GameController();
$userController = new UserController();

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
                $gameController->editGameForm($url[2]);
            else if($url[1] == 'editvalid')
                $gameController->editGameValidation();
            else if($url[1] == 'delete')
                $gameController->deleteGame($url[2]);
            else if(is_numeric($url[1]))
                $gameController->displayGame($url[1]);
        break;
        case 'redirect' : 
            if (empty($url[1]))
                $gameController->redirectGame($_POST['search-bar']);
            else
                $gameController->redirectGame(explode('/', $_GET['page'])[1]);
        break;
        case 'login' : 
            require_once 'view/login.user.view.php';
        break;
        case 'register' : 
            $userController->newUserForm();
        break;
        case 'user' :
            if ($url[1] == "registervalid")
                $userController->newUserValidation();
            if ($url[1] == "checkUser") 
                $userController;
        break;
    }
}