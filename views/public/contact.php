<?php ob_start();?>


<div id="accueil" class="">
    <h2>Contact</h2>
    
</div>
    



<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>