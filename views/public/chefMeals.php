<?php ob_start(); ?>
<div class="container mt-2">
   <!---------------------------- search----------------------------------->
  <div class="row">
    <div class="col-12 d-flex"> 
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
          <input class="form-control search mt-3 " type="search" name="search" id="search" placeholder="Recherchez...">
          <button id="btn_chefMeals" type="submit" class="btn btn-outline-secondary mt-3 mr-5" name="soumis"><i class="fas fa-search"></i></button>
        </form>
      <div class="col mt-3"><img src="./assets/pictures/chef-hat.png" alt="" class="mr-1" width="30px"></div>

      <!---------------------------- bouton toggle recherche par chef----------------------------------->
      <div class="col-4 dropdown mt-3">
        <button id="buttonChefs" class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Les menus de vos chefs</button>
        <ul id="listChefs" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <?php foreach($tabChef as $chef){ ?>
          <li><a class="dropdown-item" href="index.php?action=accueil&id=<?=$chef -> getId_chef();?>"><?=$chef->getName_chef();?></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

<!------------------------------Cards Meals--------------------------------------------------->
<?php foreach($menus as $meal){?>

  <div id="cardAccueil" class="card mt-5 mb-3" style="max-width: 1300px;">
  <div class="row">
    <div class="col-6 mt-2">
    <img src="./assets/pictures/<?=$meal->getPicture_meal();?>" alt="..." width="600px" height="250px">
    <h5 id="menuAccueil" class="card-title ml-2 mb-4 mt-3"><?=$meal->getName_meal();?> by <?=strtoupper($meal->getChef()->getName_chef());?>  <span class="ml-3"><?=$meal->getPrice()." €";?><span></h5>
    <!-- <p id="priceAccueil" class="card-text"></p> -->
    </div>

    <div class="col-6">
      <div class="card-body">
      <p class="titrePlat">Pour commencer : </p>
          <p class="card-text" id="start" style=""><?=substr($meal->getStart(), 0, 350);?></p>
          <p class="titrePlat">Pour suivre : </p>
          <p class="card-text" id="dish" style=""><?=substr($meal->getDish(), 0, 350);?></p>
          <p class="titrePlat">Et pour finir : </p>
          <p class="card-text" id="dessert" style=""><?=substr($meal->getDessert(), 0, 350);?></p>
      </div>
       <!-- Validate form -->
       <div  class="">
        
          <form action="index.php?action=checkout" method="post">
            <button id="buttonAccueil" name="envoi" type="submit" class="btn">Ajouter au panier</button>
            <input type="hidden" name="id_meal" value="<?=$meal->getId_meal();?>">
            <input type="hidden" name="name_meal" value="<?=$meal->getName_meal();?>">
            <input type="hidden" name="name_chef" value="<?=$meal->getChef()->getName_chef();?>">
            <input type="hidden" name="picture_meal" value="<?=$meal->getPicture_meal();?>">
            <input type="hidden" name="price" value="<?=$meal->getPrice();?>">
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>


<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>

