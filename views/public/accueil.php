<?php ob_start(); ?>


<div class="container">
  <div class="row ">
  <div class="col-8 d-flex"> 
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
      <input class="form-control mt-3 " type="search" name="search" id="search" placeholder="Rechechez...">
      <button type="submit" class="btn btn-outline-secondary mt-3 mr-5 " name="soumis"><i class="fas fa-search"></i></button>
    </form>
    <div class="col mt-3"><img src="./assets/pictures/chef-hat.png" alt="" class="mr-1" width="30px"></div>
    <div class="col dropdown mt-3">
      
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

<?php foreach($meals as $meal){?>

  
    <div id="cardAccueil" class="card mt-3 mb-5" >
      <div class="row g-0 ">
       
        <div class="col-5 m-2 mt-5">
          <img src="./assets/pictures/<?=$meal->getPicture_meal();?>" alt="..." width="400px">
          <h5 id="menuAccueil" class="card-title ml-2 mb-4"><?=$meal->getName_meal();?> by <?=strtoupper($meal->getChef()->getName_chef());?></h5>
        </div>
        <div class="col mt-5">
          <div class="card-body">
            <p class="card-text" id="description" style="height:100px;"><?=substr($meal->getDesc_meal(), 0, 350);?></p>
            <div id="priceAccueil" class=""><p class="card-text text-end mr-5"><?=$meal->getPrice()." €";?>

            <form action="index.php?action=checkout" method="post">
              <input type="hidden" name="id_meal" value="<?=$meal->getId_meal();?>">
              <input type="hidden" name="name_meal" value="<?=$meal->getName_meal();?>">
              <input type="hidden" name="name_chef" value="<?=$meal->getChef()->getName_chef();?>">
              <input type="hidden" name="picture_meal" value="<?=$meal->getPicture_meal();?>">
              <input type="hidden" name="price" value="<?=$meal->getPrice();?>">

              </p><button id="buttonAccueil" name="envoi" type="submit" class="btn">Acheter</button>
            </form>
          </div>
            
          
          </div>
        </div>
      </div>
    </div>

<?php } ?>
</div>

<!------------------------------end cards--------------------------------------------------------->

<!------------------------------Sidebar recherche par chef--------------------------------------------------->


<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>