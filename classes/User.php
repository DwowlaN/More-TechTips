<?php

include_once(__DIR__ . "/Db.php");

class User{
    public function __construct(){

    }
    private $id;
    private $email;
    private $password;
    private $img;
    private $username;
    private $bio;
    private $extraEmail;

        /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    /**
     * Get the value of bio
     */ 
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set the value of bio
     *
     * @return  self
     */ 
    public function setBio($bio)
    {
        if(empty($bio)){
            throw new Exception("bio can't be empty");
        }
        $this->bio = $bio;

        return $this;
    }
/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
    if(empty($email)){
        throw new Exception("e-mail can't be empty");
    }
    $this->email = $email;

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
    if(strlen($password) < 6){
        throw new Exception("Passwords must be longer than 6 characters.");
    }
    $this->password = $password;

return $this;
}

/**
 * Get the value of img
 */ 
public function getImg()
{
return $this->img;
}

/**
 * Set the value of img
 *
 * @return  self
 */ 
public function setImg($img)
{
$this->img = $img;

return $this;
}

/**
 * Get the value of username
 */ 
public function getUsername()
{
return $this->username;
}

/**
 * Set the value of username
 *
 * @return  self
 */ 
public function setUsername($username)
{
    if(empty($username)){
        throw new Exception("username can't be empty");
    }
    $this->username = $username;

return $this;
}


    /**
     * Get the value of extraEmail
     */ 
    public function getExtraEmail()
    {
        return $this->extraEmail;
    }

    /**
     * Set the value of extraEmail
     *
     * @return  self
     */ 
    public function setExtraEmail($extraEmail)
    {
        $this->extraEmail = $extraEmail;

        return $this;
    }

    public function getSessionId($email)
    {   session_start();
        $conn = Db::getConnection();
        $query = $conn->prepare("select id from users where (email) = (:email) or extraEmail = (:email)");
        $query->bindValue(":email", $email);
        $query->execute();
        $result = $query->fetch();
        return $result['id'];
    }

public function register(){
    $email = $this->getEmail();
    $emailcheck = "@student.thomasmore.be";
    $emailcheck2 = "@thomasmore.be";
    $options = [
        'cost' => 13,
    ];
    $password = password_hash($this->getPassword(), PASSWORD_DEFAULT, $options);

    $emailResult = $this->checkEmail($this->getEmail());
    var_dump($email);
    if($emailResult){
        throw new Exception("e-mail already has an account");
    }
    $conn = Db::getConnection();
    $query = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
    $query->bindValue(":username", $this->getUsername());
    $query->bindValue(":email", $this->getEmail());
    $query->bindValue(":password", $password);
    if(strpos($email, $emailcheck) !== false || strpos($email, $emailcheck2) !== false){
        $result= $query->execute();
    }else{
        throw new Exception("e-mail must end on @student.thomasmore.be or @thomasmore.be");
    }
    return $result;
}

public function checkEmail($email){
    $conn = Db::getConnection();
    $query = $conn->prepare("select email from users where (email) = (:email)");
    $query->bindValue(":email", $email);
    $query->execute();
    $result = $query->fetch();
    return $result;

}

public function canLogin(){

    $conn = Db::getConnection();
    $query = $conn->prepare("select * from users where email = (:email) or extraEmail = (:email)");

    $email = $this->getEmail();
    $query->bindValue(":email", $email);

    $query->execute();
    $result = $query->fetch();

    $password = $this->getPassword();
    $hash = $result['password'];


    if(password_verify($password, $hash)){
        return true;
    }else{
        throw new Exception("please fill in the correct username and password");
        return false;
    }
}

public function getAll()
{
    $conn = Db::getConnection();
    $query = $conn->prepare("select * from users");
    $query->execute();
    $result = $query->fetch();
    return $result;
}

public function addBio(){   
    session_start();
    $conn = Db::getConnection();
    $query = $conn->prepare("update users set bio = (:bio) WHERE (id) = (:id)");
    $query->bindValue(":bio", $this->getBio());
    $query->bindValue(":id", $_SESSION['id']);
    $result =  $query->execute();

    if($result){
        return $result;
    }else{
        throw new Exception("couldn't add bio");
    }
}

public function extraEmail(){
    session_start();
    $conn = Db::getConnection();
    $query = $conn->prepare("update users set extraEmail = (:extraEmail) WHERE (id) = (:id)");
    $query->bindValue(":extraEmail", $this->getExtraEmail());
    $query->bindValue(":id", $_SESSION['id']);
    $result =  $query->execute();

    if($result){
        return $result;
    }else{
        throw new Exception("couldn't add email");
    }
}

public function deleteUser(){
    session_start();
    $conn = Db::getConnection();
    $query = $conn->prepare("delete from users where id = (:id)");
    $query1 = $conn->prepare("delete from comments where user_id = (:id)");
    $query2 = $conn->prepare("delete from posts where user_id = (:id)");


    $query->bindValue(":id", $_SESSION['id']);
    $query1->bindValue(":id",$_SESSION['id']);
    $query2->bindValue(":id",$_SESSION['id']);

    $result = $query->execute();
    $result1 = $query1->execute();
    $result2 = $query2->execute();

    return $result.$result1.$result2;
}

public function getUserData()
{
    session_start();
    $conn = Db::getConnection();
    $query = $conn->prepare("select * from users where id = (:id)");
    $query->bindValue(":id", $_SESSION['id']);
    $query->execute();
    $result = $query->fetch();
    return $result;
}


}
