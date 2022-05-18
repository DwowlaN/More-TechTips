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


}



else{
    header("location: ../index.php");
}