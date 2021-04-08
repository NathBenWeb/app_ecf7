<?php ob_start();?>


<div id="about" class="container" >
    <h2>About</h2>
    Vos meilleurs chefs nous recommandent pour vous offrir ce que vos 
    
</div>
    



<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>