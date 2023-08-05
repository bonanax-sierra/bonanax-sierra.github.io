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
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(invalidusrname($usrname) !== false) {
        header("location: ../register.php?error=invalidusername");
        exit();
    }
    if(invalidemail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pass01,$pass02) !== false) {
        header("location: ../register.php?error=passworddontmatch");
        exit();
    }
    if(usrnameExist($conn, $usrname, $email) !== false) {
        header("location: ../register.php?error=usernameisalreadytaken");
        exit();
    }
    
    createUser($conn,$usrname,$full_name,$email,$pass01,$pass02);

}else {
    header("location: ../login.php");
}

