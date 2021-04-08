<?php

class Grade{
    private $id_g;
    private $name_grade;

    /**
     * Get the value of id_g
     */ 
    public function getId_g()
    {
        return $this->id_g;
    }

    /**
     * Set the value of id_g
     *
     * @return  self
     */ 
    public function setId_g($id_g)
    {
        $this->id_g = $id_g;

        return $this;
    }

    /**
     * Get the value of name_grade
     */ 
    public function getName_grade()
    {
        return $this->name_grade;
    }

    /**
     * Set the value of name_grade
     *
     * @return  self
     */ 
    public function setName_grade($name_grade)
    {
        $this->name_grade = $name_grade;

        return $this;
    }
}