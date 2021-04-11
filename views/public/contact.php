<?php ob_start();?>


<div id="contact_container" class="container" >
            <section id="inscription">
                <h1 id="titreInscription">Formulaire d'inscription</h1>
                <form id="contact-form" class="row g-3 ">
                    <div class="col-md-12 ">
                    <img class="fit-picture" src="./assets/pictures/contact.png" alt="" width="100%"/>
                    </div>
                        <h4 id="titreImg" class="">Rejoignez-nous !</h4>
                    <div class="col-md-12">
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Entrez votre email" required="required"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Entrez un mot de passe" required="required"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" id="inputAddress" placeholder="N° et nom de la voie" required="required"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Complément d'adresse" required="required"/>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" id="inputZip" placeholder="Code postal" required="required"/>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="inputCity" placeholder="Ville" required="required"/>
                    </div>
                    <div class="col-12">
                        <div id="check" class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required="required"/>
                            <label class="form-check-label" for="gridCheck">*J'accepte les conditions générales d'utilisation Un chef à la maison</label>
                        </div>
                    </div>
                    <div id="buttonContact" class="col-12">
                        <button type="submit" class="btn" style="border-radius: 30px; background-color:rgb(174,140,95); color: #f2f2f2;">Confirmer</button>
                    </div>
                </form>
            </section>

            <section id="contact">
                <div class="outer-container">
                <h1 id="titreContact">Contactez-nous !</h1>
                    <div class="telEmail">
                        <div class="item contact-box phone">
                            <div class="text1">
                            <span class="logoContact"><i class="fas fa-mobile-alt"></i></span>
                                <a id="tel" href="tel:+33624035012">+33 6 24 03 50 12</a>
                            </div>
                        </div>
                        <div class="item contact-box email">
                            <span class="logoContact"><i class="fas fa-at"></i></span>
                            <div class="text2"><a id="emailContact" href="mailto:nathaliebendavidweb@gmail.com">nathaliebendavidweb@gmail.com</a></div>
                        </div>
                        
                    </div>
                    <iframe id="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.534525049279!2d2.4152355510228194!3d48.84801677918476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6728424b715a3%3A0x57e198db63e65e9e!2s21%20Avenue%20Joffre%2C%2094160%20Saint-Mand%C3%A9!5e0!3m2!1sfr!2sfr!4v1616023790325!5m2!1sfr!2sfr" width="500" height="280" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                </div>
            </section>
        </div>
       

    



<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>