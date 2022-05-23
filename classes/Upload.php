<?php
include_once(__DIR__ . "/Db.php");
class Upload{
    private $image;
    private $desc;

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of desc
     */ 
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @return  self
     */ 
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    public function projectImgCheck($image)
    {
        session_start();
        $id = $_SESSION['id'];
        $targetDir = (__DIR__ . "./../uploads/");
        $fileName = $id . "_" . basename($image['name']);
        $targetPath = $targetDir . $fileName;
        $fileType = pathinfo($targetPath,PATHINFO_EXTENSION);

        $allowedTypes = array('jpg','png','jpeg','gif','pdf');
        if(isset($_POST["submit"]) && !empty($image)){
            if(in_array($fileType, $allowedTypes)){
                return true;
            }else{
                throw new Exception("filetype isn't supported");
            }
        }
    }
    public function projectImgUpload($image, $desc)
    {
        session_start();
        $id = $_SESSION['id'];
        $targetDir = (__DIR__ . "./../uploads/");
        $fileName = $id . basename($image['name']);
        $targetPath = $targetDir . $fileName;
        
        if(move_uploaded_file($image["tmp_name"], $targetPath)){
            $conn = Db::getConnection();
            $query = $conn->prepare("insert into posts (imagePath, uploadDate, description, user_id) values (:image, now(), :description, :id)");
            $query->bindValue(":image", $fileName);
            $query->bindValue(":id", $id);
            $query->bindValue(":description", $desc);
            $result =  $query->execute();
            //var_dump($result);

            if($result){
                return $result;
            }else{
                throw new Exception("couldn't upload, try again");
            }
        }
    }
}