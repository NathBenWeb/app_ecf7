<?php ob_start(); ?>
<div class="container">
<div class="row">
        <div class="col-4 offset-8">
            <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" class="input-group">
                <input class="form-control" type="search" name="search" id="search" placeholder="Rechercher">
                <button id="btn_chefMeals" type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <h2 class="text-center text-decoration-underline mb-4 mt-4">Liste des clients</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>CP</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Email</th>
                <th>Inscription</th>
                <th>Login</th>
                <th>Statut</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allClients as $client){?>

                
            <tr>
                <td><?=$client->getId_client();?></td>
                <td><?=$client->getFirstname_client();?></td>
                <td><?=$client->getName_client();?></td>
                <td><?=$client->getAddress();?></td>
                <td><?=$client->getCp();?></td>
                <td><?=$client->getCity();?></td>
                <td><?=$client->getCountry();?></td>
                <td><?=$client->getEmail_client();?></td>
                <td><?=$client->getInscription();?></td>
                <td><?=$client->getLogin_client();?></td>
                <?php if($_SESSION["Auth"]->id_g == 1){?> 
                <td class="text-center">
                    
                    <?php echo($client->getStatus_client())
                        ?'<a href="index.php?action=list_clients&id='.$client->getId_client()."&status=".$client->getStatus_client().'"onclick="return confirm(`Etes-vous sûr de vouloir désactiver ce client ?`)" class="btn" style="color:rgb(174,140,95); background-color:rgb(3, 3, 29);"><i class="fas fa-unlock"></i> DESACTIVER</a>'    
                        :'<a href="index.php?action=list_clients&id='.$client->getId_client()."&status=".$client->getStatus_client().'"onclick="return confirm(`Etes-vous sûr de vouloir activer ce client ?`)" class="btn"style="color: red; background-color:rgb(3, 3, 29);"><i class="fas fa-lock"></i> ACTIVER</a>';
                    ?>
                </td>
                <?php }?>
                <!-- <td class="text-center">
                    <a class="btn" style="color:rgb(174,140,95); background-color:rgb(3, 3, 29);" href="index.php?action=edit_client&id=<//?= $user->getId_user();?>"> 
                    <i class="fas fa-pen"></i></a>
                </td> -->
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>