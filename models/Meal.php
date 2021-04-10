<?php

class Meal{
    private $id_meal;
    private $name_meal;
    private $start;
    private $dish;
    private $dessert;
    private $price;
    private $picture_meal;
    private $chef;

    public function __construct(){
        $this -> chef = new Chef;
    }

    /**
     * Get the value of id_meal
     */ 
    public function getId_meal()
    {
        return $this->id_meal;
    }

    /**
     * Set the value of id_meal
     *
     * @return  self
     */ 
    public function setId_meal($id_meal)
    {
        $this->id_meal = $id_meal;

        return $this;
    }

    /**
     * Get the value of name_meal
     */ 
    public function getName_meal()
    {
        return $this->name_meal;
    }

    /**
     * Set the value of name_meal
     *
     * @return  self
     */ 
    public function setName_meal($name_meal)
    {
        $this->name_meal = $name_meal;

        return $this;
    }

   

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of picture_meal
     */ 
    public function getPicture_meal()
    {
        return $this->picture_meal;
    }

    /**
     * Set the value of picture_meal
     *
     * @return  self
     */ 
    public function setPicture_meal($picture_meal)
    {
        $this->picture_meal = $picture_meal;

        return $this;
    }

    /**
     * Get the value of chef
     */ 
    public function getChef()
    {
        return $this->chef;
    }

    /**
     * Set the value of chef
     *
     * @return  self
     */ 
    public function setChef($chef)
    {
        $this->chef = $chef;

        return $this;
    }

    /**
     * Get the value of start
     */ 
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of dish
     */ 
    public function getDish()
    {
        return $this->dish;
    }

    /**
     * Set the value of dish
     *
     * @return  self
     */ 
    public function setDish($dish)
    {
        $this->dish = $dish;

        return $this;
    }

    /**
     * Get the value of dessert
     */ 
    public function getDessert()
    {
        return $this->dessert;
    }

    /**
     * Set the value of dessert
     *
     * @return  self
     */ 
    public function setDessert($dessert)
    {
        $this->dessert = $dessert;

        return $this;
    }
}