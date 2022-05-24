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
    <title>Document</title>
</head>
<body>
<?php if(isset($error)): ?>
        <div><?php echo $error ?></div>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <p>select the image you want to upload</p>
        <input type="file" name="uploadImage" id="uploadImage">
        <input type="text" name="description" id="description" placeholder="description">
        <input type="submit" value="Upload Image" name="submit" id="submit">
    </form>
</body>
</html>