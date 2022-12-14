<?php

require_once 'model/UserManager.php';

class UserController {
    private $UserManager;

    public function __construct() {
        $this->UserManager = new UserManager();
    }

    public function newUserForm() {
        require_once 'view/register.user.view.php';
    }

    public function newUserValidation() {
        if ($_POST['username'] != null && $_POST['password'] != null && $_POST['mail'] != null) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $mail = htmlspecialchars($_POST['mail']);
            
            $this->UserManager->newUserDb($username, $password, $mail);
        }
    }
    
    public function checkUserLogin() {
        if ($_POST['username'] != null && $_POST['password']) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $this->UserManager->getUserByName($username);
            $user = $this->UserManager->getUser();
            if ($user->getPassword() === $password) {
                $this->startSession();
                header('Location:'.URL);
            }
            else
                echo 'erreur';
        }
    }
    
    public function startSession() {
        $_SESSION['username'] = $this->UserManager->getUser()->getUsername();
    }
    
    public function disconnectUser() {
        session_unset();
        session_destroy();
        header('Location:'.URL);
    }
}