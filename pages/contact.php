<?php
include "header.php";
// include "../fonctions/fonction_captcha.php";
 
$nom = $prenom = $login = $message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];
    $message = $_POST["message"];
    
}

$messageMail =  @$_GET["msg"];
    	
	
		

?>
<div class="row mr-0 mx-0">
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 form_contact">
        

       
            <?php //if(isset($_GET["captcha"])) if($_GET["captcha"] == "error") echo $_SESSION["captcha_error"];?>
        
            <label for="" class="label_entete "> Une question ?</label>

            <?php if($messageMail!='') {?>
            <?php if($_GET["msg"] == "0"){?>
            <p class="captchaerror">Message non envoyé, veuillez recommencer! </p>
            <?php }else{?>
                <p class="captchavalid">Votre message est bien envoyé !</p>
                <?php }} ?>
                <div class="center_form">
            <form id="form_contact" class="form-login" action="mail/envoi_mail_contact.php" method="post">

                <label for="" class="label_contact">Nom : </label><br>
                <input type=" text" class="form-control input" name="nom"
                    value=""><br>

                <label for="" class="label_contact">Prénom : </label><br>
                <input type=" text" class="form-control input" name="prenom"
                    value=""><br>

                <label for="" class="label_contact">Adresse Mail : </label><br>
                <input type=" text" class="form-control input" name="login"
                    value=""><br>

                    <label for="" class="label_contact">Tapez votre texte : </label><br>

                    <textarea class="form-control textarea" name="message" id="login" cols="30" rows="10"></textarea><br>
                    <div class="g-recaptcha" data-sitekey="6Ld7vdYUAAAAADN9pcXMkZZTaBo3KgsbY5MDjcEs"></div><br>

                <input type="submit" id="button_captcha" class="btn btn-info g-recaptcha" name="send_mail" value="Envoyer">

            </form>
            </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 contact_info">

    <label for="" class="label_entete2 "> N'hésitez pas, contactez nous !</label>
    <div class="row mr-0 mx-0 info_contact_ligne">

    <div class="col-lg-4 col-md-4 col-12 info_contact_col">
    <div class="form_info_contact">
    <div class="info_i"><i class="fas fa-envelope fa-3x"></i></div><br>
    <label for="" class="label_contact">Adresse : </label>
    <p class="text_contact">Chemin de Boisbonne <br>44300 Nantes</p>
    </div>
    </div>


    <div class="col-lg-4 col-md-4 col-12 info_contact_col">
    <div class="form_info_contact">
    <div class="info_i"><i class="fas fa-at fa-3x"></i></div><br>
    <label for="" class="label_contact">Adresse mail : </label>
    <p class="text_contact">jnv@mailoo.org</p>
    </div>
    </div>
    

    
    <div class="col-lg-4 col-md-4 col-12 info_contact_col">
    <div class="form_info_contact">
    <div class="info_i"><i class="fas fa-phone fa-3x"></i></div><br>
    <label for="" class="label_contact">Téléphone : </label>
    <p class="text_contact">00.00.00.00.00</p>
     </div>
    </div>
     
    </div>

    <div class="row mr-0 mx-0 info_location_line">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2706.4011763824906!2d-1.5181222841873256!3d47.28695931799676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805f0294950cdf5%3A0xb529a5564003f81d!2sJardin%20vivrier%20de%20Boisbonne!5e0!3m2!1sfr!2sfr!4v1584908750588!5m2!1sfr!2sfr" width="1000" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        
    </div>
</div>
          

<?php require "footer.php";?>