<?php

if (isset($_POST["resetSubmit"])) {
    $selector= bin2hex(random_bytes(8));
    $token = random_bytes(32); //authenticates user

    $url = "http://localhost/More-TechTips/resetPW.php?selector=" . $selector . "&validator= " . bin2hex($token);

    $expires = date("U") + 86400; 

    require 'DB.inc.php';

    $userEmail = $_POST["email"];

    $sqlD = "DELETE FROM pwreset WHERE pwRmail=?";
    $stmnt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmnt,$sqlD)){
        echo "There was an error";
        exit();
    }
    else{

        mysqli_stmt_bind_param($stmnt, "s", $userEmail);
        mysqli_stmt_execute($stmnt);
    }

    $sqlI = "INSERT INTO pwreset (pwRmail, pwRselector, pwRtoken, pwRexpire ) VALUES (?,?,?,?);";
    $stmnt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmnt,$sqlD)){
        echo "There was an error";
        exit();
    }
    else{
        $hasedToken = password_hash($token, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmnt, "ssss", $userEmail, $selector, $hasedToken, $expires);
        mysqli_stmt_execute($stmnt);
    }
    mysqli_stmt_close($stmnt);
    mysqli_close($conn);

    $to= $userEmail;
    $subject = "Resetting password for More-TechTips";
    $message = '<p>We recieved a password reset request. The link to reset your password is below.
    If you did not request this email, you can ignore it.</p>
    <p>This is the link to reset your password: </br>
    <a href="' . $url . '">' . $url . '</a></p>';
    $headers = "From: More-TechTips <RealMoreTechTips@gmail.com>\r\n";
    $headers = "Reply-To: RealMoreTechTips@gmail.com\r\n";
    $headers = "Content-type : text/hmtl\r\n";

    mail($to, $subject, $message, $headers);
    header("location: ../resetPWmail.php?reset=success");
} 


else{
    header("location ../index.php");
}