<?php ob_start(); ?>

<div class="container">
<h2 class="text-center text-decoration-underline mb-4 mt-4">Formulaire d'ajout de grade</h2>
    <div class="row mt-3">
        <div class="col-6 offset-3">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="text-center">

                <label for="grade">Grade</label>
                <input type="text" id="grade" name="grade" class="form-control mt-2" placeholder="Veuillez entrer le grade">
                <button type="submit" class="btn col-12 mt-3" name="soumis" style="border-radius: 30px; color:rgb(174,140,95); background-color:rgb(3, 3, 29);">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>