<?php ob_start(); 

?>

<div id="containerItem" class="container">
<div class="row mt-2">
  <div class="col-8">
    <div class="card mt-5">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="./assets/pictures/<?=$picture_meal;?>" alt="..." width="400px">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h4 class="card-title text-end"><?=$name_meal;?></h4>
            <h5 class="card-title text-end">Par <?=$name_chef;?></h5>
            <p id="priceItem" class="card-text text-end">Prix: <?=$price;?> €</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3 ml-5 mt-2">
    <h4 class="text-center">Validation</h4>
      <form>
        <label for="email">Email*</label>
        <input type="email"id="email" class="form-control" placeholder="Votre email svp...">
        <label class="mt-3" for="quant">Quantite*</label>
        <input type="number" id="quant" class="form-control" min="1" value="1" max="10">
        <input type="hidden" id="ref" value="<?=$id_meal;?>"> 
        <input type="hidden" id="name" value="<?=$name_meal;?>">
        <input type="hidden" id="chef" value="<?=$name_chef;?>">
        <input type="hidden" id="prix" value="<?=$price;?>">

        <button type="button" id="checkout-button" class="btn  col-12 mt-2">Valider</button>
      </form>
  </div>
</div>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>