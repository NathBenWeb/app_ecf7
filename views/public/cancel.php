<?php ob_start(); ?>

<div class="container">
    <h2>Echec de commande</h2>
    <p>Votre commande n'a malheureusement pu aboutir. Veuillez réessayer</p>

</div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>