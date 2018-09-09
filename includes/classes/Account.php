<?php
Class Account {
    private $errorArray;

    public function __construct() {
        $this->errorArray = [];
    }

    public function register($username, $firstName, $lastName, $email,
                             $email2, $password, $password2) {
        $this->validateUsername($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);
    }

    private function validateUsername($username) {
        if(strlen($username) > 25 || strlen($username) < 5) {
            array_push($this->errorArray, "Your username must be between 5 and 25 characters");
            return;
        }

        //Check username exists - TODO
    }

    private function validateFirstName($firstName) {

    }

    private function validateLastName($lastName) {

    }

    private function validateEmails($email, $email2) {

    }

    private function validatePasswords($password, $password2) {

    }
}