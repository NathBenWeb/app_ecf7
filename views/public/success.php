<?php ob_start(); 
    header("location:index.php?action=validation");
?>

<div class="container">
    <h2>Confirmation de votre commande</h2>
    <p>Un Chef à la maison vous remercie pour votre achat</p>

</div>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>