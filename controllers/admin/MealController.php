<?php

class MealController{
    private $adMeal;

    public function __construct(){
        $this -> adMeal = new MealModel();
        $this -> adChef = new ChefModel();
    }
 
    public function mealsList(){
        AuthController::isLogged();
        // Ici in dit si on trouve la recherche faire la recherche sinon rester en mode affichage de la liste
        if(isset($_POST["soumis"]) && !empty($_POST["search"])){
            $search = trim(htmlentities(addslashes($_POST["search"])));
            echo  $search;
            $meals = $this->adMeal->getMeals($search);
            require_once("./views/admin/meals/mealsList.php");
        }else{
            $meals = $this->adMeal->getMeals();
            require_once("./views/admin/meals/mealsList.php");
        }
    }

    public function removeMeal(){
        AuthController::isLogged();
        AuthController::accessUser();
        if(isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT)){
            $id = $_GET["id"];
            $delM = new Meal;
            $delM->setId_meal($id);
            $nbLine = $this -> adMeal -> deleteMeal($delM);
    
            if($nbLine > 0){
                header("location:index.php?action=list_meals");
            }
        }
    }

    public function editMeal(){
        AuthController::isLogged();
        if(isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT)){
            $id = $_GET["id"];
            $editM = new Meal;
            $editM->setId_meal($id);

            //editMeal = variable à integrer dans la view pour appeler la valeur pour l'affichage
            $editMeal = $this -> adMeal-> mealItem($editM); 

        // Pour afficher toutes les catégories dans le form-select de la view
            $tabChef = $this -> adChef  -> getChefs();
        
            if(isset($_POST["soumis"]) && !empty($_POST["name_meal"]) && !empty($_POST["price"])){
        
                $name_meal = addslashes(htmlspecialchars(trim($_POST["name_meal"])));
                $desc_meal = addslashes(htmlspecialchars(trim($_POST["desc_meal"])));
                $price = addslashes(htmlspecialchars(trim($_POST["price"])));
                $id_chef = addslashes(htmlspecialchars(trim($_POST["id_chef"])));
                $picture_meal = $_FILES ["picture"]["name"];

                // On va modifier l'objet $editCar créé plus haut dans le premier if
                $editMeal->setName_meal($name_meal);
                $editMeal->setDesc_meal($desc_meal);
                $editMeal->setPrice($price);
                $editMeal->setPicture_meal($picture_meal);
                $editMeal->getChef()->setId_chef($id_chef);
              
                
                // Pour pouvoir récupérer une image n'importe où et qu'elle s'importe dans le dossier image une fois téléchargée
                $destination = "./assets/pictures/";
                move_uploaded_file($_FILES["picture"]["tmp_name"], $destination.$picture_meal);

                $ok = $this->adMeal->updateMeal($editMeal);
                // if($ok > 0){
                    header("location:index.php?action=list_meals");
                // }
            }
            require_once("./views/admin/meals/editMeal.php");
        }
    }

    public function addMeal(){
        AuthController::isLogged();
        if(isset($_POST["soumis"]) && !empty($_POST["name_meal"]) && !empty($_POST["price"])){
    
            $name_meal = addslashes(htmlspecialchars(trim($_POST["name_meal"])));
            $desc_meal = addslashes(htmlspecialchars(trim($_POST["desc_meal"])));
            $price = addslashes(htmlspecialchars(trim($_POST["price"])));
            $id_chef = addslashes(htmlspecialchars(trim($_POST["id_chef"])));
            $picture_meal = $_FILES ["picture"]["name"];

            $newM = new Meal();
            $newM->setName_meal($name_meal);
            $newM->setDesc_meal($desc_meal);
            $newM->setPrice($price);
            $newM->setPicture_meal($picture_meal);
            $newM->getChef()->setId_chef($id_chef);
            
            // Pour pouvoir récupérer une image n'importe où et qu'elle s'importe dans le dossier image une fois téléchargée
            $destination = "./assets/pictures/";
            move_uploaded_file($_FILES["picture"]["tmp_name"], $destination.$picture_meal);

            $ok = $this->adMeal->insertMeal($newM);
            if($ok){
                header("location:index.php?action=list_meals");
            }
        }
        $tabChef = $this -> adChef  -> getChefs();

        require_once("./views/admin/meals/addMeal.php");
    }
}