<?php ob_start();?>


<div class="container" >
    <h2>About</h2>
    
</div>
    



<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>