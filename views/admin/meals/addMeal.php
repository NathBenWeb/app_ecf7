<?php ob_start(); ?>

<div class="container">
<h2 class="text-center text-decoration-underline mb-4 mt-4">Formulaire d'ajout de Menu</h2>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="" enctype="multipart/form-data">
                <div class="row mt-3">
                    <div class="col">
                        <label for="id_chef">Chef</label>
                        <select id="id_chef" name="id_chef" class="form-select">
                            <option value="">Choisir</option>
                            <?php foreach ($tabChef  as $chef) {; ?>
                            <option value="<?=$chef->getId_chef();?>"><?=$chef->getName_chef();?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="name_meal">Nom menu</label>
                        <input type="text" id="name_meal" name="name_meal" class="form-control" placeholder="Nom menu">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="picture">Image</label>
                        <input type="file" id="picture" name="picture" class="form-control" >
                    </div>
                    <div class="col">
                        <label for="price">Prix</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Prix">
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <label for="start">Entrée</label>
                        <textarea  id="start" name="start" class="form-control" placeholder="Entrée..." ></textarea>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <label for="dish">Plat</label>
                        <textarea  id="dish" name="dish" class="form-control" placeholder="Plat..." ></textarea>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <label for="dessert">Dessert</label>
                        <textarea  id="dessert" name="dessert" class="form-control" placeholder="Dessert..." ></textarea>
                    </div>
                </div>
                    
                <button type="submit" class="btn col-12 mb-3" name="soumis" style="border-radius: 30px; color:rgb(174,140,95); background-color:rgb(3, 3, 29);">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>