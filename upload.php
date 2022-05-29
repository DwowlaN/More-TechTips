<?php
include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/classes/Upload.php");

session_start();
if(isset($_SESSION['id'])){
    try {
        if(!empty($_POST)){
        $upload = new Upload();
        $upload->projectImgCheck($_FILES["uploadImage"]);
        $upload->projectImgUpload($_FILES["uploadImage"], $_POST["description"]);
        $upload->setImage($image);
        $upload->setDesc($desc);
        //var_dump($_POST["description"]);
    }
    }catch(\Throwable $e){
        $error = $e->getMessage();
    }
} else {
    header ("location:login.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>upload</title>
</head>
<body>
<nav class="navbar-nav">
           <div class="container-fluid text-bg-light">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="profile.php">My profile</a>
            <a class="nav-link" href="upload.php">Upload</a>
            <a class= "reset nav-link" href="resetPW.mail.php">Reset Password</a>
            <a class="nav-link" href="logout.php">Log out</a>
            </div>
       </nav>
<?php if(isset($error)): ?>
        <div><?php echo $error ?></div>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h3 class="my-3 ms-2">select the image you want to upload</h3>
        <div class="ms-3">
            <input class="form__field" type="file" name="uploadImage" id="uploadImage">
            <input class="form__field" type="text" name="description" id="description" placeholder="description">
            <input class="form__field" type="submit" value="Upload Image" name="submit" id="submit">
        </div>
    </form>
</body>
</html>