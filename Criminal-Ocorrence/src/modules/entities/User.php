<?php

class User
{
    private $name;
    private $email;
    private $password;
    private $setor;
    private $image;

    public function getName() 
    {
        return $this->name;
    }
    public function setName($value) 
    {
        $this->name = $value;
    }
    public function getEmail() 
    
    {
        return $this->email;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function getPassword() 
    {
        return $this->password;
    }
    public function setPassword($value)
    {
        $this->password = $value;
    }
    public function getSetor() 
    {
        return $this->setor;
    }
    public function setSetor($value)
    {
        $this->setor = $value;
    }
    public function getImage() 
    {
        return $this->image;
    }
    public function setImage($value)
    {
        $this->image = $value;
    }
}