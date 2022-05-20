<?php
include_once(__DIR__."/classes/User.php");
    session_start();
    if(isset($_SESSION)){
        echo "Welcome " . $_SESSION['username'];
        //alle users loopen
        //users uit getAll() functie
    } else {
        header ("location:login.php");
    }
    //if statements rond bv veldje description vna projecten
    //feature 11 zoals yt videos, id mee geven in route (get)
    //feature AJAX, query die ik die op test van email al gebruikt, dan via ajax doen

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
           <a href="http://localhost/php/more-techtips/upload.php">Upload</a>
       </nav>
       <div>
           <div>
           <?php foreach($users as $user): ?>
                <h2><?php echo $user['username']; ?></h2>
            <?php endforeach ?>
           </div>
       <a href="http://localhost/php/more-techtips/logout.php">
      <input type="submit" value="Logout"/>
      </div>
       <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="">
   </div>
</body>
</html>