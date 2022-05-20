<?php

if (isset($_POST["reset-password-submit"])) {
$selector = $_POST["selector"];
$validator = $_POST["validator"];
$password = $_POST["password"];
$passwordRepeat = $_POST["passwordRepeat"];

if (empty($password)|| empty($passwordRepeat)){
    header("Location: ../resetPW.php");
    exit();
    echo "Could not validate";
} 
else if ($password != $passwordRepeat){
    header("Location: ../resetPW.php");
    exit();
}

$currentDate = date("U");
require 'DB.inc.php';


$sql = "SELECT * FROM pwdReset WHERE pwRselector=? AND pwRexpire >=? ";
$stmnt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmnt,$sql)){
    echo "There was an error";
    exit();
}
else{

    mysqli_stmt_bind_param($stmnt, "ss", $selector, $currentDate);
    mysqli_stmt_execute($stmnt);

    $result = mysqli_stmt_get_result($stmnt);
    if (!$row = mysqli_fetch_assoc($result)){
        echo "please re-submit your reset request";
        exit();
    }
    else{
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwRtoken"]);

        if($tokenCheck === false){
            echo "please re-submit your reset request.";
            exit();
        } elseif($tokenCheck === true){
        $tokenEmail = $row['pwRmail'];

        $sql = "SELECT * FROM user WHERE email=?;";
        $stmnt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmnt,$sql)){
            echo "There was an error";
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmnt, "s", $tokenEmail);
            mysqli_stmt_execute($stmnt);
            $result = mysqli_stmt_get_result($stmnt);
            if (!$row = mysqli_fetch_assoc($result)){
            echo "error";
            exit();
            } else{
                $sql = "UPDATE user SET password=? WHERE email=?";
                $stmnt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmnt,$sql)){
                echo "There was an error";
                exit();
                }
            else{
                $newPwHash = password_hash($password, PASSWORD_DEFAULT);
             mysqli_stmt_bind_param($stmnt, "ss", $newPwHash, $tokenEmail);
             mysqli_stmt_execute($stmnt);

             $sql = "DELETE FROM pwreset WHERE pwRmail=?";
             $stmnt = mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmnt,$sql)){
                 echo "There was an error";
                 exit();
             } else{
                 mysqli_stmt_bind_param($stmnt, "s", $tokenEmail);
                 mysqli_stmt_execute($stmnt);
                 header("location:../index.php?newpwd=passwordupdate");
             }
            }
                }   
                }

        }
    }
}

}



else{
    header("location: ../index.php");
}