<?php

if (isset($_POST["resetSubmit"])) {
    $selector= bin2hex(random_bytes(8));
    $token = random_bytes(32); //authenticates user

    $url = "http://localhost/More-TechTips/resetPW.php?selector=" . $selector . "&validator= " . bin2hex($token);

    $expires = date("U") + 86400; 
} 
else{
    header("location ../index.php");
}