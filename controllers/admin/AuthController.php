<?php

// session_start();
// Si la session de l'utilisateur n'existe pas redirirection vers le formulaire de connexion
class AuthController{
    public static function isLogged(){
        if(!isset($_SESSION['Auth'])){
            header('location:index.php?action=login');
            exit;
        }
    }

// Si l'utilisateur se delogue sa session est écrasée et il est redirigé vers le formulaire de connexion
    public static function logout(){
        unset($_SESSION['Auth']);
        header('location:index.php?action=login');
    }

    public static function accessUser(){
        if($_SESSION['Auth']->id_g == 3){
        exit;
        }
    }
}