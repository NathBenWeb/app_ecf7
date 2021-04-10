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

    <h2 class="text-center text-decoration-underline mb-4 mt-4">Liste des Menus</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Entrée</th>
                <th>Plat</th>
                <th>Dessert</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Chef</th>
                <th colspan="2" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
            <?php if(is_array($meals)){ foreach ($meals as  $meal) { ?>
                <td><?=$meal->getId_meal();?></td>
                <td><?=$meal->getName_meal();?></td>
                <td><?=substr($meal->getStart(),0, 16)." </br>[Editer pour lire la suite...]";?></td>
                <td><?=substr($meal->getDish(),0, 16)." </br>[Editer pour lire la suite...]";?></td>
                <td><?=substr($meal->getDessert(),0, 16)." </br>[Editer pour lire la suite...]";?></td>
                <td><?=$meal->getPrice();?></td>
                <td><img src="./assets/pictures/<?=$meal->getPicture_meal();?>" alt="" width="100"></td>
                <td><?=$meal->getChef()->getName_chef();?></td>
                <td class="text-center">
                    <a class="btn" style="color:rgb(174,140,95); background-color:rgb(3, 3, 29);" href="index.php?action=edit_meal&id=<?= $meal->getId_meal();?>">
                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <?php if($_SESSION["Auth"]->id_g !=3){?> 
                <td  class="text-center">
                    <a class="btn" style="color: red; background-color:rgb(3, 3, 29);" href="index.php?action=delete_meal&id=<?= $meal->getId_meal();?>"
                        onclick="return confirm('Etes vous sûr de vouloir supprimer')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                <?php } ?>
            </tr>
            <?php }}else{ echo"<tr class='text-center text-danger'><td colspan='10' >".$meals."</td></tr>";} ?>
        </tbody>
    </table>
  </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/admin/templateAdmin.php');
?>
