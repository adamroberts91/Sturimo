<?php
Class Account {
    private $errorArray;
    private $con;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = [];
    }

    public function login($username, $password) {
        $encryptedPassword = md5($password);

        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$encryptedPassword'");
        if(mysqli_num_rows($query) == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function register($username, $firstName, $lastName, $email,
                             $email2, $password, $password2) {
        $this->validateUsername($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);

        if(empty($this->errorArray)) {
            return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
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

    private function insertUserDetails($username, $firstName, $lastName, $email, $password) {
        $encryptedPasswoed = md5($password);
        $profilePic = "assets/images/profile-pics/head_emerald.png";
        $date = date("Y-m-d");
        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$username', '$firstName', '$lastName', '$email', '$encryptedPasswoed', '$date', '$profilePic')");
        return $result;
    }

    private function validateUsername($username) {
        if(strlen($username) > 25 || strlen($username) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
        if(mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameExists);
        }
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

        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
        if(mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailExists);
        }
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