<?php

class GradeController{
   private $adGrade;

   public function __construct(){
       $this -> adGrade = new GradeModel();
   }

   public function gradesList(){
        AuthController::isLogged();
        $allGrade = $this -> adGrade -> getGrades();
        require_once("./views/admin/grades/gradesList.php");
   }

   public function removeGrade(){
        AuthController::isLogged();
        AuthController::accessUser();
        if(isset($_GET["id"]) && $_GET["id"] < 1000 && filter_var($_GET["id"], FILTER_VALIDATE_INT)){
            $id = trim($_GET["id"]);
        
            $nbLine = $this -> adGrade -> deleteGrade($id);

            if($nbLine > 0){
                header("location:index.php?action=list_grades");
            }
        }
   }
   
   public function editGrade(){
       AuthController::isLogged();
       if(isset($_GET["id"]) && $_GET["id"] < 1000 && filter_var($_GET["id"], FILTER_VALIDATE_INT)){
           $id = trim($_GET["id"]);
           $grade = $this -> adGrade -> gradeItem($id);
           
           if(isset($_POST["soumis"]) && !empty($_POST["grade"])){
               $gr = trim(addslashes((htmlentities($_POST["grade"]))));
               $grade -> setName_grade($gr);
               $this -> adGrade -> updateGrade($grade);
               header("location:index.php?action=list_grades");
            }
        require_once("./views/admin/grades/editGrade.php");
        }
   }
   public function addGrade(){
       AuthController::isLogged();
       if(isset($_POST["soumis"]) && !empty($_POST["grade"])){
           $name_grade = trim(addslashes((htmlentities($_POST["grade"]))));
           $newGrade = new Grade();
           $newGrade ->setName_grade($name_grade);
           $ok = $this -> adGrade-> insertGrade($newGrade);
           
           if($ok){
               header("location:index.php?action=list_grades");
            }
    }
    require_once("./views/admin/grades/addGrade.php");
   }
    
}

