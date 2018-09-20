<?php
Class Artist {
    private $errorArray;
    private $con;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = [];
    }
}