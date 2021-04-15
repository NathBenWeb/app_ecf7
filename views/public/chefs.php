<?php ob_start();?>
<div class="container">

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/pictures/cl.jpg" class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-sm-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide .</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./assets/pictures/ad.jpeg" class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide .</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./assets/pictures/ef.jpg" class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide. </p>
      </div>
    </div>
  </div>
  
</div>

<?php foreach($allChef as $chef){?>

<div class="d-flex">
<img src="./assets/pictures/<?=$chef->getPicture_chef();?>" class="" width="400px" alt="...">
<h5 id="chefs" class=""><?=$chef->getName_chef();?></h5>
</div>




<?php } ?>

<!-- <img src="..." class="rounded float-start" alt="...">
<img src="..." class="rounded mx-auto d-block" alt="...">
<img src="..." class="rounded float-end" alt="..."> -->
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>