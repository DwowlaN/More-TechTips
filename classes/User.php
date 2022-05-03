<?php
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
}
