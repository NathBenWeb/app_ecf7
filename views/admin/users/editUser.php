<?php ob_start(); 

?>

<div class="container">
    <h2 class="text-center text-decoration-underline mb-4 mt-4">Formulaire de modification utilisateur</h2>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="">
                <div class="row mt-3">
                    <div class="col">
                        <label for="id">Id</label>
                        <input class="form-control" type="text" value="<?=$user->getId_user();?>" name="id" readonly>
                    </div>
                    <div class="col">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?=$user->getFirstname();?>">
                    </div>
                    <div class="col">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?=$user->getName();?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?=$user->getEmail();?>">
                    </div>
                </div>    
                <div class="row mt-3">
                    <div class="col">
                        
                        <input type="hidden" id="pass" name="pass" class="form-control" value="<?=$user->getPass();?>">
                    </div>
                </div>    
                <div class="row mt-3">
                <div class="col">
                        <label for="grade">Grade</label>
                            <select id="grade" name="grade" class="form-select">
                                <option value="<?=$user->getGrade()->getId_g();?>">
                                    <?php
                                        foreach ($tabGrade  as $grade) {
                                            if($grade->getId_g() == $user->getGrade()->getId_g()){
                                                echo $grade -> getName_grade();
                                            } 
                                        }
                                    ?> 
                                </option>
                                <?php
                                    foreach ($tabGrade as $grade) {
                                        if( $grade->getId_g() != $user->getGrade()->getId_g()){
                                ?>
                                <option value="<?=$grade->getId_g();?>"><?= $grade->getName_grade();?></option>
                                    <?php }}; ?>
                            </select>
                    </div>
                    <div class="col">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" class="form-control" value="<?=$user->getLogin();?>">
                    </div>
                </div>
                <button type="submit" class="btn col-12 mt-4" name="soumis" style="border-radius: 30px; color:rgb(174,140,95); background-color:rgb(3, 3, 29);">Modifier</button>
            </form>
        </div>
    </div>
</div>
<?php $contenu = ob_get_clean();
    require_once("./views/admin/templateAdmin.php");
?>