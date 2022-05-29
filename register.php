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
        $_SESSION['id'] = $user->getSessionId($_POST['email']);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="mb-5 mt-3">
        <div class="form form--login m-5">
            <form action="" method="post">
                <h2>Register</h2>
                <div class="form__field">
                    <label class="form-label" for="psername">Username</label>
                    <input class="form-control" type="username" name="username">
                </div>
                <div class="form__field">
                    <label class="form-label" for="pmail">Email</label>
                    <input class="form-control" autocomplete="off" type="text" name="email">
                </div>
                <div class="form__field">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form__field mt-3">
                    <input type="submit" value="Sign in" class="btn btn-success">
                </div>
            </form>
            <?php if(isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        </div>
    </div>
    <div class="mx-5">
        <p>Already have an account?</p>
        <a href="login.php">
      <input class="btn btn-primary" type="submit" value="log in"/>
    </a>
    </div>
</body>

</html>