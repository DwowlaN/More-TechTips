<?php 
    session_start();
     // If the user is not logged in redirect to the login page...
    /*if (!isset($_SESSION['loggedin'])) {
         header('Location: index.php');
         exit;
    }*/
    //connect to MySQL db
    $mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "root";
    $mysql_database = "moretechtips";
    $con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

    

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoreTechTips</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
    <div>
        <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="profile pic here">
        <p>This is your profile page</p>

        <p>this is a user description (how tf I am gonna do the php stuff is still to figure out)</p>
    </div>
</body>