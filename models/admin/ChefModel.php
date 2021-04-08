<?php

class ChefModel extends Driver{

    public function getChefs(){
        $sql = "SELECT * FROM chefs";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabChef = [];

        foreach($rows as $row){
            $chef = new Chef();
            $chef->setId_chef($row->id_chef);
            $chef->setName_chef($row->name_chef);
            $chef->setPicture_chef($row->picture_chef);
            array_push($tabChef, $chef);
        }
        
        if($result->rowCount() > 0){
            return $tabChef;
        }else{
            return "Not found";
        }
    }

    public function deleteChef($id){
        $sql = "DELETE FROM chefs WHERE id_chef = :id";
        $result = $this -> getRequest($sql, ["id" => $id]);
        $nb = $result -> rowCount();
        return $nb;
    }

    public function chefItem($id){
        $sql = "SELECT * FROM chefs WHERE id_chef = :id";
        $result = $this -> getRequest($sql, ["id" => $id]);
        if($result -> rowCount() > 0){

            $row = $result->fetch(PDO::FETCH_OBJ);

            $chef = new Chef();
            $chef -> setId_chef($row->id_chef);
            $chef -> setName_chef($row->name_chef);
            $chef -> setPicture_chef($row->picture_chef);
            return $chef;
        }
    }

    public function updateChef(Chef $updateC){
        if($updateC -> getPicture_chef() === ""){
            $sql = "UPDATE chefs
                    SET name_chef = :name_chef
                    WHERE id_chef = :id_chef";
            
            $tabParams = ["name_chef"=>$updateC->getName_chef(),
                        "id_chef"=>$updateC->getId_chef()];
        }else{
            $sql = "UPDATE chefs
                    SET name_chef = :name_chef, picture_chef = :picture_chef
                    WHERE id_chef = :id_chef";
            
            $tabParams = ["name_chef"=>$updateC->getName_chef(),
                        "picture_chef"=>$updateC->getPicture_chef(),
                        "id_chef"=>$updateC->getId_chef()];
            
        }
        $result = $this -> getRequest($sql, $tabParams);
        if($result -> rowCount() > 0){
            $nb = $result -> rowCount();
            return $nb;
        }
    }

    public function insertChef(Chef $chef){
        $sql = "INSERT INTO chefs (name_chef, picture_chef) VALUES (:name_chef, :picture)";

        $result = $this -> getRequest($sql, array("name_chef" => $chef -> getName_chef(), "picture" => $chef -> getPicture_chef()));
        return $result;
        
    }
}