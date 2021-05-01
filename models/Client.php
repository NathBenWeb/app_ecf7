<?php

class Client{
    private $id_client;
    private $name_client;
    private $firstname_client;
    private $address;
    private $cp;
    private $city;
    private $country;
    private $email_client;
    private $inscription;
    private $login_client;
    private $pass_client;
    private $status_client;

    public function __construct(){
        
    }

    /**
     * Get the value of id_client
     */ 
    public function getId_client()
    {
        return $this->id_client;
    }

    /**
     * Set the value of id_client
     *
     * @return  self
     */ 
    public function setId_client($id_client)
    {
        $this->id_client = $id_client;

        return $this;
    }

    /**
     * Get the value of name_client
     */ 
    public function getName_client()
    {
        return $this->name_client;
    }

    /**
     * Set the value of name_client
     *
     * @return  self
     */ 
    public function setName_client($name_client)
    {
        $this->name_client = $name_client;

        return $this;
    }

    /**
     * Get the value of firstname_client
     */ 
    public function getFirstname_client()
    {
        return $this->firstname_client;
    }

    /**
     * Set the value of firstname_client
     *
     * @return  self
     */ 
    public function setFirstname_client($firstname_client)
    {
        $this->firstname_client = $firstname_client;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of cp
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */ 
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of email_client
     */ 
    public function getEmail_client()
    {
        return $this->email_client;
    }

    /**
     * Set the value of email_client
     *
     * @return  self
     */ 
    public function setEmail_client($email_client)
    {
        $this->email_client = $email_client;

        return $this;
    }

    /**
     * Get the value of inscription
     */ 
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
     * Set the value of inscription
     *
     * @return  self
     */ 
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get the value of login_client
     */ 
    public function getLogin_client()
    {
        return $this->login_client;
    }

    /**
     * Set the value of login_client
     *
     * @return  self
     */ 
    public function setLogin_client($login_client)
    {
        $this->login_client = $login_client;

        return $this;
    }

    /**
     * Get the value of pass_client
     */ 
    public function getPass_client()
    {
        return $this->pass_client;
    }

    /**
     * Set the value of pass_client
     *
     * @return  self
     */ 
    public function setPass_client($pass_client)
    {
        $this->pass_client = $pass_client;

        return $this;
    }

    /**
     * Get the value of status_client
     */ 
    public function getStatus_client()
    {
        return $this->status_client;
    }

    /**
     * Set the value of status_client
     *
     * @return  self
     */ 
    public function setStatus_client($status_client)
    {
        $this->status_client = $status_client;

        return $this;
    }
}