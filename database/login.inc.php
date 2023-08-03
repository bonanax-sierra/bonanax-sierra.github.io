<?php

include 'dbcon.inc.php';
include 'functions.inc.php';

if(isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['pass01'];

    if(emptyInputLogin($username, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
else {
    header("location: ../index.php?");
}exit();
