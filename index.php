<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "Welcome " . $_SESSION['username'];
        //queriess
    } else {
        header ("location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/Index.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoreTechTips</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div>
       <nav>
           <a class= "http://localhost/php/more-techtips/index.php" href="">Home</a>
           <a href="http://localhost/php/more-techtips/profile.php">My profile</a>
       </nav>
       <div>
       <a href="http://localhost/php/more-techtips/logout.php">
      <input type="submit" value="Logout"/>
      </div>
       <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="">
   </div>
</body>
</html>