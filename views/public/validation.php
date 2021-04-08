<?php ob_start();?>


<div class="validation" style="text-align:center; margin-top:50px;">
    <h2>Confirmation de votre commande</h2>
    <p>Un Chef à la maison vous remercie pour votre achat</p>
    <img src="./assets/pictures/champagne.jpg" width="50%" alt="" class="">
</div>
    



<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>