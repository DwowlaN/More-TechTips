<?php


include_once(__DIR__."/classes/User.php");

if (!empty($_POST)) {
        $user = new User();
        $user->setUsername($_POST["username"]);
        $user->setPassword($_POST["password"]);
    try{
        if($user->canLogin()){
            session_start();
            $_SESSION['username'] = $_POST['username'];
            header("location:index.php");
        }
    }catch(\Throwable $e){
        $error = $e->getMessage();
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>moretechtips</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="loginDiv">
        <div class="form form--login">
            <form action="" method="post">
                <h2 form__title>Log In</h2>
                <?php if (isset($error)) : ?>
                    <div class="form__error">
                        <p>
                            please fill in the correct username and password.
                        </p>
                    </div>
                <?php endif; ?>
                <div class="form__field">
                    <label for="psername">Username</label>
                    <input type="username" name="username">
                </div>
                <div class="form__field">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form__field">
                    <input type="submit" value="Sign in" class="btn btn--primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>