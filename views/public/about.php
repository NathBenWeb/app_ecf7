<?php ob_start();?>
<div id="about" class="" >
    <section id="img_about">
            
        
    </section>

    <section id="text_about">
            <p>Un événement à fêter ?</p>
            <p>Ou juste envie de passer un bon moment ?</p>
            <p>En cette période un peu particulière, pourquoi se priver d'un bon repas spécialement préparé pour vous, par vos chefs préférés ?</p>
            <p>C'est pourquoi <i>Un chef à la maison</i> s'est allié aux plus grands noms de la cuisine gastronomique pour vous offrir des moments d'exception et régaler vos papilles !</p>
            <p>A déguster chez vous, à 2 ou en famille !</p>    
    </section>
</div>


<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>