<?php

class ClientController{
    private $adClient;

    public function __construct(){
        $this-> adClient = new ClientModel();
    }

    public function clientsList(){
        AuthController::isLogged();
        if(isset($_GET["id_client"]) && isset($_GET["status_client"]) && !empty($_GET["id_client"])){
            $id_c = $_GET["id_client"];
            $status = $_GET["status_client"];
            $client = new Client();
            if($status ==1){
                $status = 0;
            }else{
                $status = 1;
            }
            $client -> setId_client($id_c);
            $client -> setStatus_client($status);

            $this -> adClient -> updateStatus_c($client);
        }
        $allClients = $this -> adClient -> getClients();
        require_once("./views/admin/clients/clientsList.php");
    }

    public function addClient(){
        AuthController::isLogged();
        if(isset($_POST["soumis"])){
            if(filter_var($_POST["email_client"], FILTER_VALIDATE_EMAIL) && strlen($_POST["pass_client"]) >= 4){
                $name = trim(htmlentities(addslashes($_POST["name_client"])));
                $firstname = trim(htmlentities(addslashes($_POST["firstname_client"])));
                $address = trim(htmlentities(addslashes($_POST["address"])));
                $cp = trim(htmlentities(addslashes($_POST["cp"])));
                $city = trim(htmlentities(addslashes($_POST["city"])));
                $country = trim(htmlentities(addslashes($_POST["country"])));
                $email = trim(htmlentities(addslashes($_POST["email_client"])));
                // $inscription = trim(htmlentities(addslashes($_POST["inscription"])));
                $login = trim(htmlentities(addslashes($_POST["login_client"])));
                $pass = md5(trim(htmlentities(addslashes($_POST["pass_client"]))));
                
                var_dump($_POST);

                $newC = new Client();
                $newC->setName_client($name);
                $newC->setFirstname_client($firstname);
                $newC->setAddress($address);
                $newC->setCp($cp);
                $newC->setCity($city);
                $newC->setCountry($country);
                $newC->setEmail_client($email);
                // $newC->setInscription($inscription);
                $newC->setLogin_client($login);
                $newC->setPass_client($pass);
                $newC->setStatus_client(1);
                

                $ok = $this -> adClient -> insertClient($newC);
                if($ok){
                    header("location:index.php?action=accueil");
                } 
            }
        }
        require_once("./views/public/contact.php");
    }

}