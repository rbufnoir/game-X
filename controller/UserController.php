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
        if ($_POST['username'] != null && $_POST['mail'] != null) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $mail = htmlspecialchars($_POST['mail']);

            $this->UserManager->newUserDb($username, $password, $mail);
        }
    }
}