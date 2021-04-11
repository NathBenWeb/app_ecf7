<?php

class PublicModel extends Driver{
    public function findMealByChef(Meal $meal){
        $sql = "SELECT * FROM meals m
                INNER JOIN chefs c
                ON m.id_chef = c.id_chef
                WHERE m.id_chef = :id";
        $result = $this->getRequest($sql, ["id"=>$meal->getChef()->getId_chef()]);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $meals = [];

        foreach($rows as $row){
            $newMeal = new Meal;
            $newMeal->setId_meal($row->id_meal);
            $newMeal->setName_meal($row->name_meal);
            $newMeal->setStart($row->start);
            $newMeal->setDish($row->dish);
            $newMeal->setDessert($row->dessert);
            $newMeal->setPrice($row->price);
            $newMeal->setPicture_meal($row->picture_meal);
            $newMeal->getChef()->setId_chef($row->id_chef);
            $newMeal->getChef()->setName_chef($row->name_chef);
            array_push($meals, $newMeal);
        }
        return $meals; 
    }

    

}