<?php

abstract class Driver{

    private static $bd;

    private static function getBd(){
        if(self::$bd === null){
            try{
                self::$bd = new PDO("mysql:host=localhost; dbname=ecf_7", "root", "");
            }catch(PDOException $e){
                die('Echec de connexion: '.$e->getMessage());
            }
        }
        return self::$bd;
    }

    // Activation des requêtes (méthode à appeler à chaque requête pour éviter de dupliquer du code)
    protected function getRequest($sql, $params = null){
        
        $result = self::getBd() ->prepare($sql);
        $result->execute($params);

        return $result;
    }
}