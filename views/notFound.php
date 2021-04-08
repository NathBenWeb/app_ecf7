<?php ob_start(); ?>

<div class="validation" style="text-align:center; margin-top:30px; ">
   
    <img src="./assets/pictures/404terr.png" width="60%" alt="" class="" style="border:solid 1px;" >
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>