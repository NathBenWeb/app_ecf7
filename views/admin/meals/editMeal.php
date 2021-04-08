<?php ob_start(); ?>

<div class="container">
<h2 class="text-center text-decoration-underline mb-4 mt-4">Modifier le menu n° <?=$editMeal->getId_meal();?></h2>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="" enctype="multipart/form-data">
                <div class="row mt-3">
                    <div class="col">
                        <label for="id_chef">Chef</label>
                        <select id="id_chef" name="id_chef" class="form-select">
                            <option value="<?=$editMeal->getChef()->getId_chef();?>">
                                <?php
                                    foreach ($tabChef as $chef){
                                        if($chef->getId_chef() == $editMeal->getChef()->getId_chef()){
                                            echo $chef -> getName_chef();
                                        }
                                    }
                                ?>
                            </option>
                                <?php
                                    foreach ($tabChef as $chef) {
                                        if( $chef->getId_chef() != $editMeal->getChef()->getId_chef()) {
                                ?>
                            <option value="<?=$chef->getId_chef();?>"><?=$chef->getName_chef();?></option>
                                <?php }}; ?>            
                        </select>
                    </div>
                
                    <div class="col">
                        <label for="name_meal">Nom menu</label>
                        <input type="text" id="name_meal" name="name_meal" class="form-control" value="<?=$editMeal->getName_meal();?>">
                    </div>
                </div>    
                <div class="row mt-3" >
                    <div class="col" style="margin-top: 40px;">
                        <label for="picture">Image</label>
                        <input type="file" id="picture" name="picture" class="form-control" value="" >
                    </div>
                    <div class="col"> 
                        <img src="./assets/pictures/<?=$editMeal->getPicture_meal();?>" alt="" width="200" class="img-thumbnail mt-2" style="margin-left:60px">
                    </div>   
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-2">
                        <label for="price">Prix</label>
                        <input type="text" style="height:63px;" id="price" name="price" class="form-control" value="<?=$editMeal->getPrice()."€";?>">
                    </div>
                
                    <div class="col-10">
                        <label for="desc_meal">Composition</label>
                        <textarea type="text" id="desc_meal" name="desc_meal" class="form-control"><?=$editMeal->getDesc_meal();?></textarea>
                    </div>
                </div>
            
                <button type="submit" class="btn col-12 mb-3" name="soumis" style="border-radius: 30px; color:rgb(174,140,95); background-color:rgb(3, 3, 29);">Modifier</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>