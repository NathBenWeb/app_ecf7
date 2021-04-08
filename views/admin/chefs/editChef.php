<?php ob_start(); ?>

<div class="container">
    <h2 class="text-center text-decoration-underline mb-4 mt-4">Formulaire de modification de Chef</h2>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="" enctype="multipart/form-data">
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Id</label>
                        <input class="form-control" type="text" value="<?=$chef->getId_chef();?>" name="id" readonly>
                    </div>
                    <div class="col">
                        <label for="name_chef">Nom Chef</label>
                        <input type="text" id="name_chef" name="name_chef" class="form-control" value="<?=$chef->getName_chef();?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col" style="margin-top: 40px;">
                        <label for="picture">Image</label>
                        <input type="file" id="picture" name="picture" class="form-control" value="">
                    </div>
                    <div class="col">
                        <img src="./assets/pictures/<?=$chef->getPicture_chef();?>" alt="" width="200" class="img-thumbnail mt-2" style="margin-left:60px">
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