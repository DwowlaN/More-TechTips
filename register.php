<?php

include_once(__DIR__."/classes/User.php");

if (!empty($_POST)) {
    try{
        session_start();
        $user = new User();
        $user->setEmail($_POST["email"]);
        $user->setUsername($_POST["username"]);
        $user->setPassword($_POST["password"]);

        $user->register();
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['id'] = $user->getSessionId($_SESSION['username']);
        var_dump($_SESSION['id']);
        header("location: index.php");
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
                <h2 form__title>Register</h2>
                <div class="form__field">
                    <label for="psername">Username</label>
                    <input type="username" name="username">
                </div>
                <div class="form__field">
                    <label for="pmail">Email</label>
                    <input autocomplete="off" type="text" name="email">
                </div>
                <div class="form__field">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form__field">
                    <input type="submit" value="Sign in" class="btn btn--primary">
                </div>
            </form>
            <?php if(isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        </div>
    </div>
    <div>
        <p>Already have an account?</p>
        <a href="http://localhost/php/more-techtips/login.php">
      <input type="submit" value="log in"/>
    </a>
    </div>
</body>

</html>