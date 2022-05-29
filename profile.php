<?php

include_once(__DIR__."/classes/User.php");
include_once(__DIR__."/classes/Post.php");

session_start();
if(isset($_SESSION['id'])){
    $allPosts = Post::getUserPosts($_SESSION['id']);
    $user = new User();
    $userData = $user->getUserData();
} else {
    header ("location:login.php");
}

try {
    if(!empty($_POST)){
    $user = new User();
    $user->setBio($_POST["bio"]);
    $user->addBio();
    $user->setExtraEmail($_POST["extraEmail"]);
    $user->extraEmail();
    $userData['bio'] = $user->getBio();
    $userData['extraEmail'] = $user->getExtraEmail();
    
}
}catch(\Throwable $e){
    $error = $e->getMessage();
}

    

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar-nav">
           <div class="container-fluid text-bg-light">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="profile.php">My profile</a>
            <a class="nav-link" href="upload.php">Upload</a>
            <a class= "reset nav-link" href="resetPW.mail.php">Reset Password</a>
            <a class="nav-link" href="logout.php">Log out</a>
            </div>
    </nav>
    <div class="ms-5 mt-3">
        <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="profile pic here">
        <p>This is your profile page</p>

        <form action="" method="post">
            <div class="form__field mt-3">
                    <label for="bio">Bio</label>
                    <input type="text" name="bio" value="<? echo htmlspecialchars($userData['bio']); ?>">
            </div>
        
            <div class="form__field mt-3">
                    <label for="extraEmail">Secondary email</label>
                    <input type="email" name="extraEmail" value="<? echo htmlspecialchars($userData['extraEmail']); ?>">
            </div>
            <div class="form__field mt-3">
                    <input type="submit" value="confirm bio & email" class="btn btn-secondary">
            </div>
            <?php if(isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
        <a href="profile.php . $result['id']"></a>
        <?php
                if(isset($_POST['delete'])):
                    //var_dump($_SESSION['id']);
                    $user->deleteUser($id);
                    header("location: register.php")
                    ?>
        <?php endif; ?>
        <form action="" method="post">
                <input class="btn btn-danger" type="submit" value="delete this user" name="delete" id="delete">
        </form>
        <?php foreach($allPosts as $p):?>
                        <img src="uploads/<?php echo ($p['imagePath'])?>" alt="img">
                        <p><?php echo htmlspecialchars($p['description'])?></p>
        <?php endforeach; ?> 
    </div>
</body>