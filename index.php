<?php
include_once(__DIR__."/classes/User.php");
include_once(__DIR__."/classes/Comment.php");



    session_start();
    if(isset($_SESSION['id'])){
        try{
            echo "Welcome " . $_SESSION['username'];
            $allComments = Comment::getAllComments(3);

            //alle users loopen
            //users uit getAll() functie
        }
        catch(\Throwable $e){
        $error = $e->getMessage();
    }}
    else {
        header ("location:login.php");
    }
    $username = $_SESSION['username'];            

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
            <p class="search">search</p>
            <a href="index.php">Home</a>
            <a href="profile.php">My profile</a>
            <a href="upload.php">Upload</a>
            <a href="logout.php">Log out</a>
       </nav>
       <div>
           <div>
                <div>
                    <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="">

                    <input type="text" id="commentText" placeholder="What do you think of this project?">
                    <a href="#" id="btnAddComment" data-postid="3">Add comment</a>
                    <?php if(isset($error)): ?>
                        <div class="error"><?php echo $error; ?></div>
                    <?php endif; ?>
                </div>
                <ul class="post__comments__list">
                    <?php foreach($allComments as $c):?>
                        <li><?php echo htmlspecialchars($c['text']); ?></li>
                    <?php endforeach; ?> 
                </ul>

                <h2><?php echo htmlspecialchars($username); ?></h2>
      
           </div>
       <script src="app.js"></script>
    </div>
   </div>
</body>
</html>