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
    <h2 class="text-center text-decoration-underline mb-4 mt-4">Liste des utilisateurs</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Login</th>
                <th>Email</th>
                <th>Statut</th>
                <th>Grade</th>
                <?php if($_SESSION["Auth"]->id_g == 1){?>
                <th colspan="2" class="text-center">Action</th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allUsers as $user){?>

                
            <tr>
                <td><?=$user->getId_user();?></td>
                <td><?=$user->getFirstname();?></td>
                <td><?=$user->getName();?></td>
                <td><?=$user->getLogin();?></td>
                <td><?=$user->getEmail();?></td>
                <td><?=$user->getGrade()->getName_grade();?></td>
                <?php if($_SESSION["Auth"]->id_g == 1){?> 
                <td class="text-center">
                    
                    <?php echo($user->getStatus())
                        ?'<a href="index.php?action=list_users&id='.$user->getId_user()."&status=".$user->getStatus().'"onclick="return confirm(`Etes-vous sûr de vouloir désactiver cet utilisateur?`)" class="btn" style="color:rgb(174,140,95); background-color:rgb(3, 3, 29);"><i class="fas fa-unlock"></i> DESACTIVER</a>'    
                        :'<a href="index.php?action=list_users&id='.$user->getId_user()."&status=".$user->getStatus().'"onclick="return confirm(`Etes-vous sûr de vouloir activer cet utilisateur?`)" class="btn"style="color: red; background-color:rgb(3, 3, 29);"><i class="fas fa-lock"></i> ACTIVER</a>';
                    ?>
                </td>
                <?php }?>
                <td class="text-center">
                    <a class="btn" style="color:rgb(174,140,95); background-color:rgb(3, 3, 29);" href="index.php?action=edit_user&id=<?= $user->getId_user();?>"> 
                    <i class="fas fa-pen"></i></a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>