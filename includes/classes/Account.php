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

        if(empty($this->errorArray)) {
            //TODO: Insert into DB
            return true;
        }
        else {
            return false;
        }
    }

    public function getError($errorMessage) {
        if(!in_array($errorMessage, $this->errorArray)) {
            $errorMessage = "";
        }
        return "<span class='errorMessage'>$errorMessage</span>";
    }

    private function validateUsername($username) {
        if(strlen($username) > 25 || strlen($username) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        //TODO: Check username exists
    }

    private function validateFirstName($firstName) {
        if(strlen($firstName) > 25 || strlen($firstName) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    private function validateLastName($lastName) {
        if(strlen($lastName) > 25 || strlen($lastName) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    private function validateEmails($email, $email2) {
        if($email != $email2) {
            array_push($this->errorArray, Constants::$emailsDoNotMatch);
            return;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        //TODO: Check email hasn't been used
    }

    private function validatePasswords($password, $password2) {
        if($password != $password2) {
            array_push($this->errorArray, Constants::$passwordsDoNotMatch);
            return;
        }

        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$passwordNotAlpha);
            return;
        }

        if(strlen($password) >= 30 || strlen($password) < 8) {
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
    }
}