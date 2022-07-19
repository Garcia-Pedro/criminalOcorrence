<?php

class Ocorrence
{
    private $title;
    private $description;
    private $category;
    private $localization;
    private $date;
    private $host;
    private $host_locatization;
    private $host_NIF;
    private $host_age;

    public function getTitle() 
    {
        return $this->title;
    }
    public function setTitle(string $value) 
    {
        $this->title = $value;
    }
    public function getDescription() 
    {
        return $this->description;
    }
    public function setDescription(string $value) 
    {
        $this->description = $value;
    }
    public function getCategory() 
    {
        return $this->category;
    }
    public function setCategory(string $value) 
    {
        $this->category = $value;
    }
    public function getLocalization() 
    {
        return $this->localization;
    }
    public function setLocalization(string $value) 
    {
        $this->localization = $value;
    }
    public function getDate() 
    {
        return $this->date;
    }
    public function setDate($value) 
    {
        $this->date = $value;
    }
    public function getHost() 
    {
        return $this->host;
    }
    public function setHost(string $value) 
    {
        $this->host = $value;
    }
    public function getHostLocal() 
    {
        return $this->host_locatization;
    }
    public function setHostLocal(string $value) 
    {
        $this->host_locatization = $value;
    }
    public function getHostNIF() 
    {
        return $this->host_NIF;
    }
    public function setHostNIF(string $value) 
    {
        $this->host_NIF = $value;
    }
    public function getHostAge() 
    {
        return $this->host_age;
    }
    public function setHostAge(string $value) 
    {
        $this->host_age = $value;
    }
}