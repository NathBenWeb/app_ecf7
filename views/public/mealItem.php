<?php ob_start(); 

?>

<div id="containerItem" class="container">
<h4 class="text-center">Mon panier</h4>
<div class="row">
  <div class="col-8">
    <div class="card mt-3">
      <div class="row g-0">
        <div class="col-md-4 mt-5">
          <img src="./assets/pictures/<?=$picture_meal;?>" alt="..." width="500px">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h4 class="card-title text-end"><?=$name_meal;?></h4>
            <h5 class="card-title text-end">by <?=$name_chef;?></h5>
            <p id="priceItem" class="card-text text-end">Prix : <?=$price;?> €</p>
            
            <div class="col offset-7 mt-2">
              <label class="" for="quant">Quantité*</label>
              <input type="number" id="quant" class="form-control" min="1" value="1" max="10">
            </div>
            <div class="col mt-3">
            <a class="btn" id="buttonValid" href="index.php?action=del_meal&id=<?= $id_meal;?>"
            onclick="return confirm('Etes vous sûr de vouloir supprimer')"><i class="fas fa-trash"></i> Supprimer          
            </a>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Vue Panier -->
  <div id="validation" class="col-3 ml-5 border p-3">
      <form>
        <label class="text-end" for="date">Date de livraison souhaitée*</label>
        <input type="date" id="date" class="form-control mb-2">
        <label for="totalMenu" id="totalMenu">Prix total menu</label>
        <input type="text"id="totalMenu" class="form-control mb-2" readonly>
        <label for="livraison" id="livraison">Livraison</label>
        <input type="text"id="livraison" class="form-control mb-2" value="8.90" readonly>
        <label for="total" id="total">Prix total commande</label>
        <input type="text"id="total" class="form-control mb-2" value="" readonly>
        <label for="email" id="emailValider">Email*</label>
        
        <input type="email"id="email" class="form-control" placeholder="Veuillez saisir votre email...">
        <!-- <label class="mt-3" for="quant">Quantite*</label>
        <input type="number" id="quant" class="form-control" min="1" value="1" max="10"> -->

        <input type="hidden" id="ref" value="<?=$id_meal;?>"> 
        <input type="hidden" id="name" value="<?=$name_meal;?>">
        <input type="hidden" id="chef" value="<?=$name_chef;?>">
        <input type="hidden" id="prix" value="<?=$price;?>">

        <button type="button" id="checkout-button" class="btn  col-12 mt-3">Valider ma commande</button>
      </form>
  </div>
</div>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>