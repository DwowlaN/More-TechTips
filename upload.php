<?php
include_once(__DIR__ . "/classes/Upload.php");

try {
    if(!empty($_POST)){
    $upload = new Upload();
    $upload->projectImgCheck($_FILES["uploadImage"]);
    $upload->projectImgUpload($_FILES["uploadImage"], $_POST["description"]);
}
}catch(\Throwable $e){
    $error = $e->getMessage();
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
        //select a picture
        <input type="file" name="uploadImage" id="uploadImage">
        <input type="text" name="description" id="description" placeholder="description">
        <input type="submit" value="Upload Image" name="submit" id="submit">
    </form>
</body>
</html>