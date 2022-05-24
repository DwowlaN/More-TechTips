<?php


include_once(__DIR__."/classes/User.php");

if (!empty($_POST)) {
        $user = new User();
        $user->setUsername($_POST["username"]);
        $user->setPassword($_POST["password"]);
    try{
        $id = $user->getSessionId($_POST["username"]);
        if($user->canLogin()){

            session_start();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;
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
                    <label for="username">Username</label>
                    <input type="username" name="username">
                </div>
                <div class="form__field">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form__field">
                    <input type="submit" value="Log in" class="btn btn--primary">
                </div>
            </form>
        </div>
    </div>
    <div>
        <p>new here?</p>
        <a href="http://localhost/php/more-techtips/register.php">
      <input type="submit" value="Create new account"/>
    </a>
    </div>
</body>

</html>