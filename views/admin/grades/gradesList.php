<?php ob_start(); ?>

<h2 class="text-center text-decoration-underline mb-4 mt-4">Liste des grades</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Grade</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allGrade as $grade){?>

            
        <tr>
            <td><?=$grade->getId_g();?></td>
            <td><?=$grade->getName_grade();?></td>
            <td class="text-center">
                <a class="btn" style="color:rgb(174,140,95); background-color:rgb(3, 3, 29);" href="index.php?action=edit_grade&id=<?= $grade->getId_g();?>">
                <i class="fas fa-pen"></i></a>
            </td>
            <?php if($_SESSION["Auth"]->id_g !=3){?>
            <td class="text-center">
                <a class="btn" style="color: red; background-color:rgb(3, 3, 29);" href="index.php?action=delete_grade&id=<?= $grade->getId_g();?>"
                onclick="return confirm('Etes-vous sûr de vouloir supprimer')">
                <i class="fas fa-trash"></i></a>
            </td>
            <?php } ?>
        </tr>
        <?php }?>
    </tbody>
</table>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>