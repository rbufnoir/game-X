<?php

class User {
    private string $username;
    private string $password;
    private string $mail;
    private string $role;

    public function __construct($username, $password, $mail) {
        $this->username = $username;
        $this->mail = $mail;
        $role[] = "user";
    }

    /**
     * Get the value of username
     */ 
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail() {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail) {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole() {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role) {
        $this->role[] = $role;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }
}