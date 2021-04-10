
<?php ob_start(); ?>
<div class="container">
<div class="row">
        <div class="col-4 offset-8">
            <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" class="input-group" enctype="multipart/form-data">
                <input class="form-control" type="search" name="search" id="search" placeholder="Rechercher">
                <button id="btn_chefMeals" type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <h2 class="text-center text-decoration-underline mb-4 mt-4">Liste des Chefs</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Image</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allChef as $chef){?>

                
            <tr>
                <td><?=$chef->getId_chef();?></td>
                <td><?=$chef->getName_chef();?></td>
                <td><img src="./assets/pictures/<?=$chef->getPicture_chef();?>" alt="" width="100"></td>
                <td class="text-center">
                    <a class="btn" style="color:rgb(174,140,95); background-color:rgb(3, 3, 29);" href="index.php?action=edit_chef&id=<?= $chef->getId_chef();?>">
                    <i class="fas fa-pen"></i></a>
                </td>
                <?php if($_SESSION["Auth"]->id_g !=3){?>
                <td class="text-center">
                    <a class="btn" style="color: red; background-color:rgb(3, 3, 29);" href="index.php?action=delete_chef&id=<?= $chef->getId_chef();?>"
                    onclick="return confirm('Etes-vous sûr de vouloir supprimer')">
                    <i class="fas fa-trash"></i>
                </td>
                <?php } ?>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>