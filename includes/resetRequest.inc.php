<?php

if (isset($_POST["resetSubmit"])) {
    $selector= bin2hex(random_bytes(8));
    $token = random_bytes(32); //authenticates user

    $url = "http://localhost/More-TechTips/resetPW.php?selector=" . $selector . "&validator= " . bin2hex($token);

    $expires = date("U") + 86400; 

    require 'DB.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwreset WHERE pwRmail=?";
    $stmnt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmnt,$sql)){
        echo "there was an error";
        exit();
    }
    else{

        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

} 


else{
    header("location ../index.php");
}