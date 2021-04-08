<?php ob_start(); ?>

<div class="container">
<h2 class="text-center text-decoration-underline mb-4 mt-4">Formulaire de connexion</h2>
    <div class="row mt-3">
        <div class="col-6 offset-3">
            <?php if(isset($error)){?>
                <div class="alert alert-danger text-center"><?=$error?></div>
            <?php } ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center">
               
                <div class=" mb-4 col">
                    <label for="loginEmail">Login ou Email*</label>
                    <input type="text" id="loginEmail" name="loginEmail" class="form-control mt-3" placeholder="Veuillez entrez votre login ou votre email">
                </div>
                <div class="mb-4 col">
                    <label for="pass">Mot de passe*</label>
                    <input type="password" id="pass" name="pass" class="form-control mt-3" placeholder="Veuillez entrez votre mot de passe">
                </div>
                
                <button type="submit" class="btn col-12 mt-2" style="border-radius: 30px; color:rgb(174,140,95); background-color:rgb(3, 3, 29);" name="soumis">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>