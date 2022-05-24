<?php

include_once(__DIR__."/classes/User.php");

session_start();
if(isset($_SESSION['id'])){
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
    //$user->printBio();
    $bioPrint= $user->getBio();
    $extraEmailPrint = $user->getExtraEmail();
    
    //$user->deleteUser($_POST["id"]);
    //$user->deleteUser();
    
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
    <div>
        <img src="https://memegenerator.net/img/instances/52441577.jpg" alt="profile pic here">
        <p>This is your profile page</p>

        <form action="" method="post">
            <div class="form__field">
                    <label for="bio">Bio</label>
                    <input type="bio" name="bio" value="<? echo $bioPrint; ?>">
            </div>
        
            <div class="form__field">
                    <label for="extraEmail">Add a secondary email</label>
                    <input type="extraEmail" name="extraEmail" value="<? echo $extraEmailPrint; ?>">
            </div>
            <div class="form__field">
                    <input type="submit" value="confirm bio & email" class="btn btn--primary">
            </div>
        </form>
        <a href="profile.php . $result['id']"></a>

        <div>
            <?php if(isset($error)): ?>
                <div><?php echo $error ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>