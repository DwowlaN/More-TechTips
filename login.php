<?php


include_once(__DIR__."/classes/User.php");

if (!empty($_POST)) {
        $user = new User();
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
    try{
        $id = $user->getSessionId($_POST["email"]);
        if($user->canLogin()){

            session_start();
            $_SESSION['id'] = $id;
            $userData = $user->getUserData();
            var_dump($userData);
            $_SESSION['username'] = $userData['username'];
            //$_SESSION['username'] = $_POST['username'];
            //$_SESSION['id'] = 62;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="mb-5 mt-3">
        <div class="form form--login mx-5">
            <form action="" method="post">
                <h2>Log In</h2>
                <?php if(isset($error)): ?>
                        <div class="error"><?php echo $error; ?></div>
                    <?php endif; ?>
                <div class="form__field mt-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email">
                </div>
                <div class="form__field mt-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form__field mt-2">
                    <input class="btn btn-primary" type="submit" value="Log in" class="btn btn--primary">
                </div>
            </form>
        </div>
    </div>
    <div class="mx-5">
        <p>new here?</p>
        <a href="register.php">
      <input class="btn btn-secondary" type="submit" value="Create new account"/>
    </a>
    </div>
</body>

</html>