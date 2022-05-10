<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resetpassword</title>
</head>
<body>
    <main>
        <div class="main-wrapper">
            <section class="default-section">
                <h1>Reset your password</h1>
                <p>An e-mail will be send to you with instructions on how to reset your password.</p>
                <form action="includes/resetRequest.inc.php" method="post">
                    <input type="text" name="email" placeholder="Enter e-mail">
                    <button type="submit" name="resetSubmit">Receive link to change password.</button>
                </form>
                <?php
                if (isset($_GET["reset"])){
                    if ($_GET["reset"] == "success"){
                        echo '<p class="mailsend"> Check your e-mail!</p>';
                    }
                }             
                ?>
            </section>
        </div>
    </main>
    
</body>
</html>