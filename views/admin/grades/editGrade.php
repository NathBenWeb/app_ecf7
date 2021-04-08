<?php ob_start(); ?>

<div class="container">
    <h2 class="text-center text-decoration-underline mb-4 mt-4">Formulaire de modification de grade</h2>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="">
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Id</label>
                        <input class="form-control" type="text" value="<?=$grade->getId_g();?>" name="id" readonly>
                    </div>
                    <div class="col">
                        <label for="grade" id="graduation">Grade</label>
                        <input type="text" id="grade" name="grade" class="form-control" value="<?=$grade->getName_grade();?>">
                    </div>
                </div>
                <button type="submit" class="btn col-12 mt-4" name="soumis" style="border-radius: 30px; color:rgb(174,140,95); background-color:rgb(3, 3, 29);">Modifier</button>
            </form>
        </div>
    </div>
</div>
<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>