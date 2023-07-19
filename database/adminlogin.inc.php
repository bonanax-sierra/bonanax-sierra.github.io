<?php

include 'dbcon.inc.php';
include 'functions.inc.php';

if(isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['pass01'];

    if(emptyInputLoginAdmin($username, $password) !== false) {
        header("location: ../adminlogin.php?error=emptyinput");
        exit();
    }

    loginAdmin($conn, $username, $password);
}
else {
    header("location: ../dashboard.php?");
}exit();
