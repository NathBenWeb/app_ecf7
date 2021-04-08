<?php

class ChefController{
    private $adChef;

    public function __construct(){
        $this -> adChef = new ChefModel();
    }
    
    public function chefsList(){
        AuthController::isLogged();
        $allChef = $this -> adChef -> getChefs();
        require_once("./views/admin/chefs/chefsList.php");
    }

    public function removeChef(){
        AuthController::isLogged();
        AuthController::accessUser();
        if(isset($_GET["id"]) && $_GET["id"] < 1000 && filter_var($_GET["id"], FILTER_VALIDATE_INT)){
            $id = trim($_GET["id"]);
            
            $nbLine = $this -> adChef -> deleteChef($id);

            if($nbLine > 0){
                        header("location:index.php?action=list_chefs");
            }
        }
    }

    public function editChef(){
        AuthController::isLogged();
        if(isset($_GET["id"]) && $_GET["id"] < 1000 && filter_var($_GET["id"], FILTER_VALIDATE_INT)){

            $id = trim($_GET["id"]);
            $chef = $this -> adChef -> chefItem($id);
            
            if(isset($_POST["soumis"]) && !empty($_POST["name_chef"])){
                $name_chef = trim(addslashes((htmlentities($_POST["name_chef"]))));
                $picture_chef = $_FILES ["picture"]["name"];

                $chef -> setName_chef($name_chef);
                $chef -> setPicture_chef($picture_chef);

                $destination = "./assets/pictures/";
                move_uploaded_file($_FILES["picture_chef"]["tmp_name"], $destination.$picture_chef);

                $this -> adChef -> updateChef($chef);
                header("location:index.php?action=list_chefs");
            }
            require_once("./views/admin/chefs/editChef.php");
        }

    }

    public function addChef(){
        AuthController::isLogged();
        if(isset($_POST["soumis"]) && !empty($_POST["name_chef"])){
                $name_chef = trim(addslashes((htmlentities($_POST["name_chef"]))));
                $picture_chef = $_FILES["picture"]["name"];

                $newChef = new Chef();
                $newChef ->setName_chef($name_chef);
                $newChef ->setPicture_chef($picture_chef);

               $ok = $this -> adChef -> insertChef($newChef);
               
                if($ok){
                    header("location:index.php?action=list_chefs");
                }
        }
        require_once("./views/admin/chefs/addChef.php");
    }
}

