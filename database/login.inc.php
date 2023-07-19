<?php

include 'dbcon.inc.php';
include 'functions.inc.php';

if(isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['pass01'];

    if(emptyInputLogin($username, $password) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
else {
    header("location: ../index.php?");
}exit();
<<<<<<< HEAD
=======
?>
>>>>>>> 8ce4d42b0f8282e4489ac3328dfd4bff95d28b7e
