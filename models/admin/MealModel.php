<?php

class MealModel extends Driver{

    public function getMeals($search = null){
        if(!empty($search)){
            $sql = "SELECT * FROM meals m
                    INNER JOIN chefs c
                    ON m.id_chef = c.id_chef
                    WHERE name_meal LIKE :name_meal OR name_chef LIKE :name_chef
                    ORDER BY id_meal";

                $searchParams = [
                    "name_meal" =>"$search%",
                    "name_chef"=>"$search%"
                ];
                $result = $this->getRequest($sql, $searchParams);
    
        }else{
            $sql = "SELECT * FROM meals m
                INNER JOIN chefs c
                ON m.id_chef = c.id_chef
                ORDER BY id_meal";

                $result = $this->getRequest($sql);
        }

        $meals = $result->fetchAll(PDO::FETCH_OBJ);


        $tabMeals = [];
       
        foreach($meals as $meal){
            $m = new Meal();
            $m->setId_meal($meal->id_meal);
            $m->setName_meal($meal->name_meal);
            $m->setStart($meal->start);
            $m->setDish($meal->dish);
            $m->setDessert($meal->dessert);
            $m->setPrice($meal->price);
            $m->setPicture_meal($meal->picture_meal);
            $m->getChef()->setId_chef($meal->id_chef);
            $m->getChef()->setName_chef($meal->name_chef);
            array_push($tabMeals, $m);
        }
        
        if($result->rowCount() > 0){
            return $tabMeals;
        }else{
            return "Not found";
        }
    }
    // Pour supprimer via un objet dans le Model
    public function deleteMeal(Meal $meal){
        $sql = "DELETE FROM meals WHERE id_meal = :id";
        $result = $this -> getRequest($sql, ["id" => $meal -> getId_meal()]);

        return $result->rowCount();

    }

    public function mealItem(Meal $mParam){
        $sql = "SELECT * FROM meals WHERE id_meal = :id";
        $result = $this -> getRequest($sql, ["id" => $mParam->getId_meal()]);

        if($result -> rowCount() > 0){
            $mealRow = $result->fetch(PDO::FETCH_OBJ);

            $editMeal = new Meal();
            $editMeal -> setId_meal($mealRow->id_meal);
            $editMeal -> setName_meal($mealRow->name_meal);
            $editMeal->setStart($mealRow->start);
            $editMeal->setDish($mealRow->dish);
            $editMeal->setDessert($mealRow->dessert);
            $editMeal -> setPrice($mealRow->price);
            $editMeal -> setPicture_meal($mealRow->picture_meal);
            $editMeal -> getChef()->setId_chef($mealRow->id_chef);
            return $editMeal;
        }
    }

    public function updateMeal(Meal $updateM){
        if($updateM -> getPicture_meal() === ""){
            $sql = "UPDATE meals
                SET name_meal = :name_meal, start = :start, dish = :dish, dessert = :dessert, price = :price, id_chef = :id_chef
                WHERE id_meal = :id_meal";

            $tabParams = ["name_meal"=>$updateM->getName_meal(),
                            "start"=>$updateM->getStart(),
                            "dish"=>$updateM->getDish(),
                            "dessert"=>$updateM->getDessert(),
                            "price"=>$updateM->getPrice(),
                            "id_chef"=>$updateM->getChef()->getId_chef(),
                            "id_meal"=>$updateM->getId_meal()];
        }else{
            $sql = "UPDATE meals
                SET name_meal = :name_meal, start = :start, dish = :dish, dessert = :dessert, price = :price, picture_meal = :picture, id_chef = :id_chef
                WHERE id_meal = :id_meal";

            $tabParams = ["name_meal"=>$updateM->getName_meal(),
                            "start"=>$updateM->getStart(),
                            "dish"=>$updateM->getDish(),
                            "dessert"=>$updateM->getDessert(),
                            "price"=>$updateM->getPrice(),
                            "picture"=>$updateM->getPicture_meal(),
                            "id_chef"=>$updateM->getChef()->getId_chef(),
                            "id_meal"=>$updateM->getId_meal()];
        }

        $result = $this -> getRequest($sql, $tabParams);
        return $result -> rowCount();
    }

    public function insertMeal(Meal $meal){
        $sql = "INSERT INTO meals(name_meal, start, dish, dessert, price, picture_meal, id_chef)
                VALUES (:name_meal, :start, :dish, :dessert, :price, :picture, :id_chef)";

       $tabParams = ["name_meal"=>$meal->getName_meal(),
                    "start"=>$meal->getStart(),
                    "dish"=>$meal->getDish(),
                    "dessert"=>$meal->getDessert(),
                    "price"=>$meal->getPrice(),
                    "picture"=>$meal->getPicture_meal(),
                    "id_chef"=>$meal->getChef()->getId_chef()];
        $result = $this -> getRequest($sql, $tabParams);
        return $result;
    } 
}