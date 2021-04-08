<?php

class UserController{
    public function __construct(){
        $this-> adUser = new UserModel();
        $this-> adgr = new GradeModel();
    }

    // Méthode qui permet d'activer ou désactiver le statut de l'utilisateur
    public function usersList(){
        AuthController::isLogged();
        if(isset($_GET["id"]) && isset($_GET["status"]) && !empty($_GET["id"])){ // S'il y a existence du statut alors rentrer dans cette condition
            $id_u = $_GET["id"];
            $status = $_GET["status"];
            $user = new User();
            if($status ==1){
                $status = 0;
            }else{
                $status = 1;
            }
            $user -> setId_user($id_u);
            $user -> setStatus($status);

            $this -> adUser -> updateStatus($user);
        }
        $allUsers = $this -> adUser -> getUsers();
        require_once("./views/admin/users/UsersList.php");
    }

    public function login(){
        if(isset($_POST["soumis"])){
            if (isset($_POST["soumis"]) && strlen($_POST["pass"]) >= 4 && !empty($_POST["loginEmail"])){
                $loginEmail = trim(htmlentities(addslashes($_POST["loginEmail"])));
                $pass = md5(trim(htmlentities(addslashes($_POST["pass"]))));
                $data_u = $this -> adUser -> signIn($loginEmail, $pass);
                if(!empty($data_u)){
                    if($data_u -> status > 0){
                        session_start();
                        $_SESSION["Auth"] = $data_u;
                        header("location:index.php?action=list_meals");
                    }else{
                        $error = "Votre compte n'existe plus";
                    }
                }else{
                    $error = "Votre login/email et/ou mot de passe ne correspondent pas";
                }
            }else{
                $error = "Veuillez entrer au moins 4 caractères";
            }
        }
        require_once("./views/admin/users/login.php");
    }

    public function editUser(){

        AuthController::isLogged();
        if(isset($_GET["id"]) && $_GET["id"] < 1000 && filter_var($_GET["id"], FILTER_VALIDATE_INT)){
            $id = trim($_GET["id"]);
            $editU = new User;
            $editU -> setId_user($id);

            $user = $this -> adUser -> userItem($editU);

            $tabGrade = $this -> adgr  -> getGrades();
            
            if(isset($_POST["soumis"]) && !empty($_POST["name"])){

                $id_u = addslashes(htmlspecialchars(trim($_POST["id"])));
                $firstname = addslashes(htmlspecialchars(trim($_POST["firstname"])));
                $name = addslashes(htmlspecialchars(trim($_POST["name"])));
                $login = addslashes(htmlspecialchars(trim($_POST["login"])));
                $pass = addslashes(htmlspecialchars(trim($_POST["pass"])));
                $email = addslashes(htmlspecialchars(trim($_POST["email"])));
                $id_g = addslashes(htmlspecialchars(trim($_POST["grade"])));

                // $user_u = new User();
                // $user->setId_user($id_u);
                $user->setFirstname($firstname);
                $user->setName($name);
                $user->setLogin($login);
                $user->setPass($pass);
                $user->setEmail($email);
                $user->setStatus(1);
                $user->getGrade()->setId_g($id_g);
                 $ok =$this->adUser->updateUser($user);
                header("location:index.php?action=list_users");
            }   
                // var_dump($_POST['id']);

                // if($ok > 0){
                // }
        require_once("./views/admin/users/editUser.php");
        }
                 
    }

 // public function editUser(){
    //     if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
           
    //         $id = trim($_GET['id']); 
    //         $user = $this->adUser->userItem($id);

    //         if(isset($_POST['submit'])){

    //             $nom = trim(addslashes(htmlentities($_POST['nom'])));
    //             $user->setNom($nom);
    //             $prenom = trim(addslashes(htmlentities($_POST['prenom'])));
    //             $user->setPrenom($prenom);
    //             $email = trim(addslashes(htmlentities($_POST['email'])));
    //             $user->setEmail($email);
    //             $login = trim(addslashes(htmlentities($_POST['login'])));
    //             $user->setLogin($login);
    //             $pass = trim(addslashes(htmlentities($_POST['pass'])));
    //             $user->setPass($pass);
    //             $grade = trim(addslashes(htmlentities($_POST['grade'])));
    //             $user->setGrade($grade);

    //             $nb = $this->adUser->updateUser($user);

    //             if($nb>0){
    //                 header('location:index.php?action=list_user');
    //             }
    //         }

    //         require_once('./views/admin/adminEditUser.php');

    //     }
    // }






    public function addUser(){
        AuthController::isLogged();
        if(isset($_POST["soumis"])){
            if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && strlen($_POST["pass"]) >= 4){
                $name = trim(htmlentities(addslashes($_POST["name"])));
                $firstname = trim(htmlentities(addslashes($_POST["firstname"])));
                $email = trim(htmlentities(addslashes($_POST["email"])));
                $pass = md5(trim(htmlentities(addslashes($_POST["pass"]))));
                $login = trim(htmlentities(addslashes($_POST["login"])));
                $id_g = trim(htmlentities(addslashes($_POST["grade"])));

                $newU = new User();
                $newU->setFirstname($firstname);
                $newU->setName($name);
                $newU->setLogin($login);
                $newU->setPass($pass);
                $newU->setEmail($email);
                $newU->setStatus(1);                
                $newU->getGrade()->setId_g($id_g);
                

                $ok = $this -> adUser -> insertUser($newU);
                if($ok){
                    header("location:index.php?action=list_users");
                } 
            }
        }
        $tabGrade = $this -> adgr -> getGrades();

        require_once("./views/admin/users/addUser.php");
    }

    
}