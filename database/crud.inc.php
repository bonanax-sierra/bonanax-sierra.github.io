<?php

require_once 'dbcon.inc.php';
require_once 'functions.inc.php';

if(isset($_POST['submit'])) {
    
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $errorMSG = "";

    // Insert the customer data into the database
    $sql = "INSERT INTO customers (lname,fname,email,contact,address) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: customer_add_form.php?error=sqlerror");
        exit();
    } 
    elseif(empty($lname) || empty($fname) || empty($email) || empty($contact) || empty($address)) {
        $errorMSG = "All the fields are required";
        header("Location: ../customer_add_form.php>error=error");
    }
    else {
        mysqli_stmt_bind_param($stmt, "sssss", $lname, $fname, $email, $contact, $address);
        mysqli_stmt_execute($stmt);
        header("Location: ../customer_add_form.php?success=true");
        exit();
    }
}

mysqli_close($conn);