<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MoreTechTips</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<main>
        <div class="main-wrapper">
            <section class="default-section">
            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector)|| empty($validator)){
                    echo "Could not validate";
                }
                else{
                    if(ctype_xdigit($selector) !== false && ctype_digit($validator) !==false){
            ?>
                    <form action="includes/resetPW.inc.php">
                    <input type="hidden" name="selector" value = "<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value = "<?php echo $validator; ?>">
                    <input type="password" name="password" placeholder="new password">
                    <input type="password" name="passwordRepeat" placeholder="repeat new password">
                    <button type="submit" name="reset-password-submit">Reset password</button>
                    </form>


                    <?php
                    if (isset($GET["newpwd"])){
                        if($GET["newpwd"] == "passwordupdate"){
                            echo '<p class="signupsucces">yoer password has been reset!</p>';
                        }

                    }
                    }
                }

                ?>
            </section>
        </div>
    </main>
</body>

</html>