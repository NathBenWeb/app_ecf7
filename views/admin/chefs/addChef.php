<?php ob_start(); ?>

<div class="container">
<h2 class="text-center text-decoration-underline mb-4 mt-4">Formulaire d'ajout de Chefs</h2>
<div class="row">
        <div class="col-8 offset-2">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col">
                    <label for="name_chef">Nom Chef</label>
                    <input type="text" id="name_chef" name="name_chef" class="form-control mt-3" placeholder="Veuillez entrer la nom du chef">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label for="picture">Image</label>
                    <input type="file" id="picture" name="picture" class="form-control">
                </div>
                <!-- <div class="col">
                    <img src="./assets/pictures/<//?=$chef->getPicture_chef();?>" alt="" width="200" class="img-thumbnail mt-2">
                </div> -->
            </div>
            <button type="submit" class="btn col-12 mt-3" name="soumis" style="border-radius: 30px; color:rgb(174,140,95); background-color:rgb(3, 3, 29);">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>