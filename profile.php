<?php

include_once(__DIR__."/classes/User.php");
include_once(__DIR__."/classes/Post.php");

session_start();
if(isset($_SESSION['id'])){
    $allPosts = Post::getUserPosts($_SESSION['id']);

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
    $bioPrint= $user->getBio();
    $extraEmailPrint = $user->getExtraEmail();
    
}
}catch(\Throwable $e){
    $error = $e->getMessage();
}

    

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
<a href="http://localhost/php/more-techtips/index.php">Home</a>
<a href="http://localhost/php/more-techtips/upload.php">Upload</a>
<a href="http://localhost/php/more-techtips/logout.php">Log out</a>

    <div>
        <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="profile pic here">
        <p>This is your profile page</p>

        <form action="" method="post">
            <div class="form__field">
                    <label for="bio">Bio</label>
                    <input type="bio" name="bio" value="<? echo htmlspecialchars($bioPrint); ?>">
            </div>
        
            <div class="form__field">
                    <label for="extraEmail">Add a secondary email</label>
                    <input type="extraEmail" name="extraEmail" value="<? echo htmlspecialchars($extraEmailPrint); ?>">
            </div>
            <div class="form__field">
                    <input type="submit" value="confirm bio & email" class="btn btn--primary">
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
                <input type="submit" value="delete this user" name="delete" id="delete">
        </form>
        <?php foreach($allPosts as $p):?>
                        <img src="uploads/<?php echo ($p['imagePath'])?>" alt="img">
                        <p><?php echo htmlspecialchars($p['description'])?></p>
        <?php endforeach; ?> 
    </div>
</body>