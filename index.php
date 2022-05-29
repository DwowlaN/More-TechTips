<?php
include_once(__DIR__."/classes/User.php");
include_once(__DIR__."/classes/Comment.php");



    session_start();
    if(isset($_SESSION['id'])){
        try{
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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoreTechTips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
   <div class="mt-2">
       <nav class="navbar-nav">
           <div class="container-fluid text-bg-light">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="profile.php">My profile</a>
            <a class="nav-link" href="upload.php">Upload</a>
            <a class= "reset nav-link" href="resetPW.mail.php">Reset Password</a>
            <a class="nav-link" href="logout.php">Log out</a>
            </div>
       </nav>
       <div>
           <div>
                <div class="ms-3 mt-3">
                    <div  class="ms-2">
                        <h2><?php echo "Welcome " . $_SESSION['username'];?></h2>
                    </div>
                    <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="">

                    <input type="text" id="commentText" class="form__field" placeholder="What do you think of this project?">
                    <a href="#" id="btnAddComment" class="btn btn-secondary" data-postid="3">Add comment</a>
                    <?php if(isset($error)): ?>
                        <div class="error"><?php echo $error; ?></div>
                    <?php endif; ?>
                </div>
                <ul class="post__comments__list list-group list-group-flush mx-5 mt-3 mb-5">
                    <?php foreach($allComments as $c):?>
                        <li class="list-group-item"><?php echo htmlspecialchars($c['text']); ?></li>
                    <?php endforeach; ?> 
                </ul>

                <h2><?php echo htmlspecialchars($username); ?></h2>
      
           </div>
       <script src="app.js"></script>
    </div>
   </div>
</body>
</html>