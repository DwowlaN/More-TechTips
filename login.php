<?php

function canLogin($username, $email, $password)
{
    if ($username === "test" && $email === "test@test" && $password === "12345") {
        return true;
    } else {
        return false;
    }
}


if (!empty($_POST)) {
    // er is iéts gepost!
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // checken of user mag aanloggen
    if (canLogin($username, $email, $password)) {
        session_start();
        $_SESSION['email'] = $email; // Op de server !!!

        // doorsturen naar index.php
        header("Location: index.php");
    } else {
        // error tonen
        $error = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IMDFlix</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="loginDiv">
        <div class="form form--login">
            <form action="" method="post">
                <h2 form__title>Sign In</h2>
                <?php if (isset($error)) : ?>
                    <div class="form__error">
                        <p>
                            please fill in the correct email and password.
                        </p>
                    </div>
                <?php endif; ?>
                <div class="form__field">
                    <label for="Username">Username</label>
                    <input type="username" name="username">
                </div>
                <div class="form__field">
                    <label for="Email">Email</label>
                    <input autocomplete="off" type="text" name="email">
                </div>
                <div class="form__field">
                    <label for="Password">Password</label>
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