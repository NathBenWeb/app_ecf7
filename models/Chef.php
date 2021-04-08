<?php

class Chef{
    private $id_chef;
    private $name_chef;
    private $picture_chef;

    /**
     * Get the value of id_chef
     */ 
    public function getId_chef()
    {
        return $this->id_chef;
    }

    /**
     * Set the value of id_chef
     *
     * @return  self
     */ 
    public function setId_chef($id_chef)
    {
        $this->id_chef = $id_chef;

        return $this;
    }

    /**
     * Get the value of name_chef
     */ 
    public function getName_chef()
    {
        return $this->name_chef;
    }

    /**
     * Set the value of name_chef
     *
     * @return  self
     */ 
    public function setName_chef($name_chef)
    {
        $this->name_chef = $name_chef;

        return $this;
    }

    /**
     * Get the value of picture_chef
     */ 
    public function getPicture_chef()
    {
        return $this->picture_chef;
    }

    /**
     * Set the value of picture_chef
     *
     * @return  self
     */ 
    public function setPicture_chef($picture_chef)
    {
        $this->picture_chef = $picture_chef;

        return $this;
    }
}