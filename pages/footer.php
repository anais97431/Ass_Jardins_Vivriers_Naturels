<footer>


    <div class="container-fluid ">
        <div class="row bandeau_footer">
            <!-- <div class=" col-lg-8 col-md-8"> -->
            <div class="col-md-2 offset-1 bandeau_footer_col1">
                <h5>ÇA FAIT DU BIEN</h5>
                <button><a href="https://www.projetfinalelgueta.fr/pages/mentions_legales#cvg" rel="nofollow">Le Concept</a></button><br>
                <button><a href="https://www.projetfinalelgueta.fr/pages/mentions_legales#mentionsLegales" rel="nofollow">Le blog</a></button><br>
                <button><a href="https://www.projetfinalelgueta.fr/pages/mentions_legales#protectionsdesDonnees" rel="nofollow">Presse</a></button><br>
                <button><a href="https://www.projetfinalelgueta.fr/pages/contact" rel="nofollow">Contact</a></button><br>
            </div>
            <div class="col-md-2  bandeau_footer_col2">
                <h5>C'EST QUOI ?</h5>
                <button><a href="https://www.projetfinalelgueta.fr/pages/mentions_legales#cvg" rel="nofollow">Comment ça marche ?</a></button><br>
                <button><a href="https://www.projetfinalelgueta.fr/pages/mentions_legales#mentionsLegales" rel="nofollow">Pour quoi ?</a></button><br>
                <button><a href="https://www.projetfinalelgueta.fr/pages/mentions_legales#protectionsdesDonnees" rel="nofollow">Pour qui ?</a></button><br>

            </div>

            <div class="col-md-2 bandeau_footer_col3">
                <h5>CONDITIONS</h5>
                <button><a href="">Mentions légales</a></button><br>
                <button><a href="">Engagement en matières de confidentilité</a></button><br>
                <button><a href="">Politique de confidentialité</a></button><br>
            </div>
            <!-- </div> -->
            <div class="col-md-1">

            </div>
            <div class="col-md-2 suivez__nous">
                <p>Suivez-nous <img width="50" src="../photos/icons/picto-facebook-couleur.png" alt=""><img width="50" src="../photos/icons/picto-instagram-couleur.png" alt=""></p>
            </div>

        </div>
    </div>







</footer>


<!-- </div> -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.min.js"></script>



<!--------SCRIPT GALLERY PHOTO PAGE PRODUCT---------->
<script async>
    function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        var imgText = document.getElementById("imgtext");
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        imgText.innerHTML = imgs.alt;
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    }
</script>


<!--------SCRIPT JQUERY POUR LA BARRE D'INDICATION MOT DE PASSE---------->
<script async>
    jQuery(document).ready(function() {
        jQuery(".password").keyup(function() {
            passwordStrength(jQuery(this).val());
        });
    });
</script>








<?php $identification =  isset($_GET["message"]) ?>

<!-- <?php var_dump($identification);
        // die();
        ?> -->

<script async>
    $(document).ready(function() {

        <?php if (@$add_cart) { ?>
            $('.modalAjoutPanier').modal('show');
        <?php } ?>


        <?php if (@$endStock) { ?>
            $('.outOfStock').modal('show');
        <?php } ?>


        //  $('.modalConnect').modal('show');

        <?php if (@$identification === true) { ?>
            $('.modalConnect').modal('show');
        <?php } ?>
        // Modal account si niveau de securite mot de passe trop bas
        <?php $erreurPassword =  isset($_GET["erreur-securite"]) ?>
        <?php if (@$erreurPassword) { ?>
            $('.modalRegister').modal('show');
        <?php } ?>

        // Modal account si mot de passe incorrect-->
        <?php $erreurPassword2 =  isset($_GET["erreur-password"]) ?>
        <?php if (@$erreurPassword2) { ?>
            $('.modalRegister').modal('show');
        <?php } ?>

        //quand on clic sur bouton créer un compte la modal connexion se ferme pour laisser l'autre apparaitre seule
        $('#createCompte').on("click", function() {
            $('.modalConnect').modal('hide');
            $('.modalRegister').modal('show');
        });

        //quand on clic sur bouton mot de passe oublié la modal connexion se ferme pour laisser l'autre apparaitre seule
        $("#link-forgot-pass").on("click", function() {

            $('.modalForgot').modal('show');
            $('.modalConnect').modal('hide');
        });

        // Modal doublon si l'utilisateur est déjà inscrit
        <?php $messagedoublon =  isset($_GET["doublon"]) ?>

        <?php if (@$messagedoublon) { ?>
            $('.modalRegister').modal('show');
        <?php } ?>

        // Modal mot de passe oublié si le login n'est pas dans la base de donnée
        <?php $messagelogin = isset($_GET["erreurlog"]) ?>

        <?php if (@$messagelogin) { ?>
            $('.modalForgot').modal('show');
        <?php } ?>


        // Modal success pour paiement réussi

        <?php $success =  isset($_GET["success"]) ?>

        <?php if (@$success) { ?>
            $('.modalSuccess').modal('show');
        <?php } ?>


        // Modalcancel pour paiement echec

        <?php $cancel =  isset($_GET["cancel"]) ?>

        <?php if (@$cancel) { ?>
            $('.modalCancel').modal('show');
        <?php } ?>


        /*Modal affichage new PWD*/

        <?php $modalPwdnew =  isset($_GET["newpwd-id"]) ?>

        <?php if ($modalPwdnew) { ?>
            $('.modalNewpwd').modal('show');
        <?php } ?>


        /*Modal succès  new PWD*/
        <?php $newpwdsuccess =  isset($_GET["newpwd-success"]) ?>

        <?php if ($newpwdsuccess) { ?>
            $('.newPwdsuccess').modal('show');
        <?php } ?>

        /*Modal succès  CREATE ACCOUNT*/
        <?php $newaccountsuccess =  isset($_GET["newaccount-success"]) ?>

        <?php if ($newaccountsuccess) { ?>
            $('.newUserAccount').modal('show');
        <?php } ?>

        // HIDE-SHOW MODALS SUCCES NEW ACCOUNT & CONNEXION      
        // HIDE-SHOW MODALS SUCCES NEW PWD & CONNEXION
        $("#link-connexion-modal").on("click", function() {

            $('.modalConnect').modal('show');
            $('.newPwdsuccess').modal('hide');
        });

        // HIDE-SHOW MODALS SUCCES NEW ACCOUNT & CONNEXION 

        $("#link-account-modal").on("click", function() {

            $('.modalConnect').modal('show');
            $('.newUserAccount').modal('hide');
        });
        /*Modal erreur renouvellement PWD*/

        <?php $errorPwd =  isset($_GET["pwd-error"]) ?>

        <?php if ($errorPwd) { ?>
            $('.erreurPwd').modal('show');
        <?php } ?>



    });
</script>



<!---------------- Modal (.modalConnect) de Connexion déclenchée au clic BTN Ajouter au panier-------------------->
<div class="modal fade modalConnect" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-connection">Connectez-vous !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="x">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php $identification = isset($_GET["message"]) ?>

                <?php if ($identification) { ?>
                    <div class="alerte-login-false-modal">Identifiants incorrects !</div>
                <?php } ?>

                <br>

                <!--FORM CONNEXION-->
                <form action="index" method="post">
                    <div class="form-group">
                        <label for="inputEmailConnexion">Adresse e-mail</label>
                        <input name="connection_identifier" value="" type="text" class="form-control" id="inputEmailConnexion" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="inputPwdConnexion">Mot de passe</label>
                        <input name="password_connect" value="" type="password" class="form-control" id="inputPwdConnexion">
                    </div>

                    <button type="submit" name="connectionModal" value="connexion-modal" class="btn-modal-connect">Connexion</button>


                </form>
                <!--FIN FORM-->
                <p><button class="btn-register-oublie" id="link-forgot-pass">Mot de passe oublié ?</button></p>
            </div>

            <div class="modal-footer">

                <p class="adhesion"> Pas encore adhérent ? <button class="btn-register-compte" id="createCompte">Créez votre compte !</button></p>

            </div>
        </div>
    </div>
</div>



<!--Modal (.modalRegister) de création de compte déclenchée au clic sur lien Créez votre compte dans modal Connexion-->
<div class="modal fade modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-register">Inscrivez-vous !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php $messagedoublon = isset($_GET["doublon"]) ?>

                <?php if ($messagedoublon) { ?>
                    <div class="alerte-login-exist-modal">Adresse mail déjà existante !</div>
                <?php } ?>

                <?php
                $erreurPassword = isset($_GET["erreur-securite"]);

                if ($erreurPassword) { ?>
                    <div class="alerte-password-securite-modal">Niveau de sécurité trop faible</div>
                <?php } ?>
                <?php $erreurPassword2 = isset($_GET["erreur-password"]);

                if ($erreurPassword2) { ?>
                    <div class="alerte-password-false-modal">Vos mots de passe ne correspondent pas, merci de retaper votre mot de passe</div>
                <?php } ?>
                <!--FORM INSCRIPTION-->
                <form action="index.php" method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputFirstName">Prénom</label>
                                <input name="first_name" value="" type="text" class="form-control" id="inputFirstName">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputLastName">Nom</label>
                                <input name="last_name" value="" type="text" class="form-control" id="inputLastName">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Adresse e-mail</label>
                        <input name="connection_identifier" value="" type="email" class="form-control" id="inputEmailInscription" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label for="inputPwdInscription">Mot de passe</label>
                        <input name="password1" value="" type="password" class="form-control password" id="inputPwdInscription" data-toggle="tooltip" title="minimum 8 caractères avec au moins 1 majuscule 1 minuscule 1 caractère spécial et 1 chiffre" data-placement="right" aria-describedby="inputGroupPrepend3" required pattern=".{8,}">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="inputPwdInscription2">Retapez votre mot de passe</label>
                        <input name="password2" value="" type="password" class="form-control" id="inputPwdInscription2">
                    </div>

                    <br>
                    <h4>Sécurité mot de passe : </h4>
                    <div class="progress progress-striped active">
                        <div id="" class="progress-bar jak_pstrength" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>

                    </div><br>
                    <h4>Text</h4>
                    <p id="jak_pstrength_text" class="text-center"></p>
                    <br>
                    <button type="submit" name="inscriptionModal" value="inscription-modal" class="
                            btn-modal-connect">Je m'inscris</button>

                    <p>Nous, Jardins Naturels Vivriers, collectons vos données sur ce formulaire pour effectuer la création de votre compte qui vous permettra de passer commande et pour vous envoyer des mails de notifications, ce qui ne serait pas possible si vous ne nous communiquez pas les renseignements demandés. Vous bénéficiez d'un droit d'accès, de rectification et d'opposition au traitement des données vous concernant. Pour en savoir plus <a href="mentionsLegales.php#pretectionsdesDonnées">c'est ici !</a></p>
                </form>
                <!--FIN FORM-->
            </div>
        </div>
    </div>
</div>

<!-- Modal Succès CREATION COMPTE-->
<div class="modal fade newUserAccount" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_newuser_account">Votre compte a bien été créé ! </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Pour vous connecter, <button id="link-account-modal" name="link-connexion-modal" class="btn-register-transparent"><b>cliquez ici !</b></button></p>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal succès renouvellement MDP-->

<!--Modal (.modalForgot) de récupération de mot de passe-->
<div class="modal fade modalForgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-forgot">Mot de passe oublié</h5><br>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">


                    <!--Msg erreur si login inexistant dans la bdd-->
                    <?php $messagelogin = isset($_GET["erreurlog"]) ?>

                    <?php if ($messagelogin) { ?>
                        <div class="alerte-login-non-existant">L'adresse mail n'éxiste pas !</div>
                    <?php } ?>

                    <!---->
                </div>
                <p>Afin de renouveler votre mot de passe, merci de renseigner votre adresse mail ci-dessous : </p>
                <!--FORM-->
                <form action="index.php" method="post">
                    <div class="form-group">
                        <!-- <label for="inputEmail">Adresse e-mail</label>-->
                        <input name="login_user" value="" type="email" class="form-control" id="inputEmailForgot" aria-describedby="emailHelp">
                    </div>
                    <br>
                    <button type="submit" name="forgot-pass" value="forgot-pass" class="
                            btn-modal-connect">Envoyer</button>
                </form>
                <!--FIN FORM-->
            </div>
        </div>
    </div>
</div>
<!--Fin Modal (.modalForgot) -->

<!--Modal (.modalNewpwd) de régénération de mot de passe-->
<div class="modal fade modalNewpwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-newpwd">Renouvellement de votre mot de passe</h5><br>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">


                    <!--Msg erreur si login inexistant dans la bdd-->
                    <?php
                    if (isset($erreur)) {
                        echo '<font color="red">' . $erreur . '</font>';
                    } ?>
                    <!---->
                </div>
                <p>Veuillez saisir votre nouveau mot de passe : </p>
                <!--FORM-->
                <form action="index.php" method="post">
                    <div class="form-group">

                        <!---->
                        <input type="password" class="password" name="mot_de_passe1" value="" placeholder="Nouveau mot de passe" class="form-control" id="validationServerUsername1" aria-describedby="inputGroupPrepend3" data-toggle="tooltip" title="minimum 8 caractères avec au moins 1 majuscule 1 minuscule 1 caractère spécial et 1 chiffre" data-placement="right" required pattern=".{8,}">
                    </div>

                    <div class="input-group">
                        <input type="password" name="mot_de_passe2" value="" placeholder="retaper votre mot de passe" class="form-control" id="validationServerUsername2" data-toggle="tooltip" title="minimum 8 caractères avec au moins 1 majuscule 1 minuscule 1 caractère spécial et 1 chiffre" data-placement="right" aria-describedby="inputGroupPrepend3" required pattern=".{8,}">
                    </div>

                    <div class="progress progress-striped active">
                        <div id="" class="progress-bar jak_pstrength" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>

                    <input type="hidden" name="id_custom" value="<?php echo @$var2; ?>">
                    <br>
                    <button type="submit" name="modify_pwd" value="modify_pwd" class="
                            btn-modal-connect">Modifier</button>
                </form>
                <!--FIN FORM-->
            </div>
        </div>
    </div>
</div>
<!--Fin Modal (.modalFNewpwd) -->

<!-- Modal Succès renouvellement MDP-->
<div class="modal fade newPwdsuccess" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_password_success">Votre mot de passe a bien été réinitialisé !</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Pour vous connecter, <button id="link-connexion-modal" name="link-connexion-modal" class="btn-register-transparent"><b>cliquez ici !</b></button></p>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal succès renouvellement MDP-->





<!-- Modal Erreur renouvellement MDP-->
<div class="modal fade erreurPwd" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Une erreur inattendue s'est produite, merci de <a href="contact.php"><b>contacter l'administrateur</b></a></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal renouvellement MDP-->



<!--Modal (.modalSuccess) pour confirmation de commande-->
<div class="modal fade modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-success">Confirmation de commande</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM INSCRIPTION-->
                <form action="index.php" method="post">
                    <h5>Merci pour votre achat <?php echo $_SESSION['first_name'] ?> !</h5>
                    <p>A bientôt !</p>
                    <br>
                </form>
                <!--FIN FORM-->
            </div>
        </div>
    </div>
</div>

<!--Modal (.modalCancel) pour confirmation de commande-->
<div class="modal fade modalCancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-cancel">Echec de la commande</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM INSCRIPTION-->
                <form action="index.php" method="post">
                    <h4>Un problème est survenu lors de votre paiement.</h3>
                        <p>Veuillez réitérer votre commande ou nous contacter.</p>
                        <p>Merci pour votre confiance !</p>
                        <br>
                </form>
                <!--FIN FORM-->
            </div>
        </div>
    </div>
</div>

<!--Modal (.modalAjoutPanier) pour informer que le produit à bien été ajouté-->
<div class="modal fade modal modalAjoutPanier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-ajout-panier">Confirmation de commande</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="index.php" method="post">
                    <h5>Panier <?php echo $_SESSION['first_name'] ?> !</h5>
                    <p>Votre article à bien été ajouter !</p>
                    <br>
                </form>
                <!--FIN FORM-->
            </div>
        </div>
    </div>
</div>


<!--Modal (.modalEndStock) pour informer que le produit à bien été ajouté-->
<div class="modal fade outOfStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-out-of-stock">Epuisement des stocks !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM INSCRIPTION-->
                <form action="index.php" method="post">
                    <h5>Cet article n'est plus en stock :(</h5>

                    <br>
                </form>
                <!--FIN FORM-->
            </div>
        </div>
    </div>
</div>
<!-- Balise script permettant d'afficher l'utilisation des cookies -->



<script type="text/javascript" id="cookieinfo" src="//cookieinfoscript.com/js/cookieinfo.min.js" data-bg="#611047" data-fg="#FFFFFF" data-link="#FFFF00" data-divlink="#FFFFFF" data-divlinkbg="#41002C" data-linkmsg="Plus d'info" data-moreinfo=https://www.projetfinalelgueta.fr/pages/mentions_legales#cookies data-message="Nous utilisons des cookies pour améliorer votre expérience. En poursuivant votre navigation sur ce site, vous acceptez notre utilisation des cookies" data-cookie="CookieInfoScript" data-text-align="left" data-close-text="Continuer" async>
</script>


</body>

</html>

<?php
ob_flush();
?>