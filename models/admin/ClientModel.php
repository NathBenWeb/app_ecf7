<?php

class ClientModel extends Driver{

    public function getClients(){
        $sql = "SELECT * FROM clients c
                ORDER BY c.id_client";
        $result = $this-> getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabClient = [];

        foreach($rows as $row){
            $client = new Client();
            $client->setId_client($row->id_client);
            $client->setName_client($row->name_client);
            $client->setFirstname_client($row->firstname_client);
            $client->setaddress($row->address);
            $client->setCp($row->cp);
            $client->setCity($row->city);
            $client->setCountry($row->country);
            $client->setEmail_client($row->email_client);
            $client->setInscription($row->inscription);
            $client->setLogin_client($row->login_client);
            $client->setPass_client($row->pass_client);
            $client->setStatus_client($row->status_client);
            
            array_push($tabClient, $client);
        }
            return $tabClient;

    }

    public function updateStatus_c(Client $clStat){
        $sql = "UPDATE clients SET status_client = :status_client WHERE id_client = :id_client";
        $result = $this -> getRequest($sql, ['status_client' => $clStat -> getStatus_client(), 'id_client' => $clStat -> getId_client()]);
        return $result -> rowCount();
    }

    public function insertClient(Client $cl){
        $sql = "INSERT INTO clients (name_client, firstname_client, address, cp, city, country, email_client, inscription, login_client, pass_client, , status_client)
                VALUES (:name_client, :firstname_client, :address, :cp, :city, :country, :email_client, :inscription, :login_client, :pass_client, :status_client)";
        
        $tabParams = ["name_client"=>$cl->getName_client(),
                    "firstname_client"=>$cl->getFirstname_client(),
                    "address"=>$cl->getAddress(),
                    "cp"=>$cl->getCp(),
                    "city"=>$cl->getCity(),
                    "country"=>$cl->getCountry(),
                    "email_client"=>$cl->getEmail_client(),
                    "inscription"=>$cl->getInscription(),
                    "login_client"=>$cl->getLogin_client(),
                    "pass_client"=>$cl->getPass_client(),
                    "status_client"=>$cl->getStatus_client()];     
        $result = $this -> getRequest($sql, $tabParams);
        return $result;
    }
}