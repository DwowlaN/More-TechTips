<?php


/*function canLogin($username, $email, $password)
{
    if ($username === "test" && $email === "test@test" && $password === "12345") {
        return true;
    } else {
        return false;
    }
}*/

include_once(__DIR__."/classes/User.php");

if (!empty($_POST)) {
    try{
        $user = new User();
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setUsername($_POST["username"]);

        $user->register();
        header("location: register.php");
    }catch(\Throwable $e){
        $error = $e->getMessage();
    }

    // er is iéts gepost!
    /* $username = $_POST['username'];
    $email = $_POST['email'];
    $options = [
        'cost' => 13,
    ];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
    $conn = new PDO('mysql:host=localhost;dbname=moretechtips_db', "root", "root");
    $query = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
    $query->bindValue(":username", $username);
    $query->bindValue(":email", $email);
    $query->bindValue(":password", $password);
    $query->execute();
    $emailcheck = "@g.com";
    if(strpos($email, $emailcheck) !== false){
        echo"gotti";
    }else{
        echo"nope";
    }
    header("login.php"); */
    
    
   

    /*$conn = new PDO('mysql:host=localhost;dbname=studentcard', "root", "root");
    $statement = $conn->
    prepare("insert into student (firstname, lastname) values (:firstname, :lastname)");
    $statement->bindValue("firstname", $this->firstname);
    $statement->bindValue("lastname", $this->lastname);
    return $statement->execute();*/

    // checken of user mag aanloggen
    /*if (canLogin($username, $email, $password)) {
        session_start();
        $_SESSION['email'] = $email; // Op de server !!!

        // doorsturen naar index.php
        header("Location: index.php");
    } catch(\Throwable $th){
        $error = $th->getMessage();
    }*/
}
/*if (str_ends_with($email,'@thomasmore.be')){
    echo "good email";
}else{
    echo "bad email";
}*/

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
</body>

</html>