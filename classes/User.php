<?php

use LDAP\Result;

class User{
    public function __construct(){

    }
    private $email;
    private $password;
    private $img;
    private $username;

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
$this->username = $username;

return $this;
}

public function register(){
    $options = [
        'cost' => 13,
    ];
    $password = password_hash($this->getPassword(), PASSWORD_DEFAULT, $options);
    $conn = new PDO('mysql:host=localhost;dbname=moretechtips_db', "root", "root");
    $query = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
    $query->bindValue(":username", $this->getUsername());
    $query->bindValue(":email", $this->getEmail());
    $query->bindValue(":password", $password);
    $email=$this->getEmail();
    $emailcheck = ".be";
    if(strpos($email, $emailcheck) !== false){
        $result= $query->execute();
    }else{
        throw new Exception("must end on .be");
    }
    
    return $result;

}
    /*public function emailCheck(){
        $conn = new PDO('mysql:host=localhost;dbname=moretechtips_db', "root", "root");
        $query = $conn->prepare("select * from users where email = '".$_POST['email']."'");
        $result = $query->execute();
        $emailcheck = $result->fetch_assoc();
        return(is_array($emailcheck)&&count($emailcheck>0));
    }*/
}
