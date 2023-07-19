<?php

if(isset($_POST['submit'])) {

    $usrname = $_POST['username'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $pass01 = $_POST['pass01'];
    $pass02 = $_POST['pass02'];

    require_once 'dbcon.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($usrname,$full_name,$email,$pass01,$pass02) !== false) {
        header("location: ../adminreg.php?error=emptyinput");
        exit();
    }
    if(invalidusrnameAdmin($usrname) !== false) {
        header("location: ../adminreg.php?error=invalidusername");
        exit();
    }
    if(invalidemailAdmin($email) !== false) {
        header("location: ../adminreg.php?error=invalidemail");
        exit();
    }
    if(pwdMatchAdmin($pass01,$pass02) !== false) {
        header("location: ../adminreg.php?error=passworddontmatch");
        exit();
    }
    if(usrnameExistAdmin($conn, $usrname, $email) !== false) {
        header("location: ../adminreg.php?error=usernameisalreadytaken");
        exit();
    }
    
    createAdmin($conn,$usrname,$full_name,$email,$pass01,$pass02);

}else {
    header("location: ../dashboard.php");
}

