<?php

class User {
    private $username;
    private $password;
    private $type;

    public function __construct($username, $password, $type)
    {
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
    }

    public function displayUser() {
        echo "User: " . $this->username . " - Password: " . $this->password . " - Type: " . $this->type;
    }

    public function getType() {
        return $this->type;
    }

    public function getUser() {
        return $this->username;
    }
}

session_start();
// $user = new User("Eduardo", "12345", "admin");
// $user = new User("Sam", "abcdef", "teacher");
// $user = new User("David", "0123", "student");

if (isset($user)) {
    $_SESSION['typeUser'] = $user->getType();
}

if(isset($_SESSION['typeUser'])) {
    if($_SESSION['typeUser'] === "admin") {
        echo "Display admin page" . "<br>"; // include "admin.php";
        $user->displayUser();
    } elseif($_SESSION['typeUser'] === "teacher") {
        echo "Display teacher page" . "<br>"; // include "teacher.php"
        $user->displayUser();
    }
    else {
        echo "Display student page" . "<br>"; // include "student.php" 
        $user->displayUser();    
    }
} else {
    echo "There is no active user"; // include_once "login.php"
}

session_unset();
session_destroy();

?>