<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/User.php");

class Post
{
    public function __construct(){
    }

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

    public function getUserPosts($id){
        $conn = Db::getConnection();
        $query = $conn->prepare("select * from posts where user_id = :user_id");
        $query->bindValue("user_id", $id);
        $result= $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);

    }
}