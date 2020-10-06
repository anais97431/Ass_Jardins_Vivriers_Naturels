<!DOCTYPE html>

<?php
ob_start();
ini_set('display_errors', 1);
session_start();
require "conect.php";
require "../fonctions/fonctions_category.php";
require "../fonctions/fonctions_users.php";
require "../fonctions/fonctions_panier.php";
require "../fonctions/crypt.php";


$categoryMenu = select_category_header();


@$menu = $_GET["id"];
switch ($menu) {
    case 1:
        $active[$menu] = " active";
        break;
    case 2:
        $active[$menu] = " active";
        break;
    case 3:
        $active[$menu] = " active";
        break;
    case 4:
        $active[$menu] = " active";
        break;
    case 5:
        $active[$menu] = " active";
        break;
    case 10:
        $active[$menu] = " active";
        break;

    default:
        $active["0"] = " active";
}


$total_panier = 0;

if (isset($_POST)) {
    // Protection des POSTs et récupération des POST
    @$recherche = htmlspecialchars($_POST["recherche"]);
    @$compte = htmlspecialchars($_POST["compte"]);
    @$deconnexion = htmlspecialchars($_POST["deconnexion"]);
    @$creation = htmlspecialchars($_POST["creation"]);
    @$last_name = htmlspecialchars($_POST["last_name"]);
    @$first_name = htmlspecialchars($_POST["first_name"]);
    @$connection_identifier = $_POST["connection_identifier"];
    //var_dump($connection_identifier);
    @$connection_identifierOubli = htmlspecialchars($_POST["connection_identifierOubli"]);
    @$connexion = htmlspecialchars($_POST["inscriptionModal"]);
    //@$doublon = doublon_user($connection_identifier);
    @$connectionModal = htmlspecialchars($_POST["connectionModal"]);
    @$inscriptionModal = htmlspecialchars($_POST["inscriptionModal"]);
    @$id_user = htmlspecialchars($_SESSION["id_user"]);
}

if (isset($_POST)) {

    @$password1 = htmlspecialchars($_POST["password1"]);
    @$password2 = htmlspecialchars($_POST['password2']);
    @$modifier_pwd = htmlspecialchars($_POST['modify_pwd']);
    @$passe_hash =  decrypt($password);
    @$id_custom =  $_POST['id_custom'];


    // Condition pour réaliser la création d'un compte
    // Si il y a une inscription via la modale 
    if (@$inscriptionModal) {
        // Si l'identifiant est égale a un identifiant déjà existant
        if ($connection_identifier == doublon_user($connection_identifier)) {
            header('Location: index?doublon=true');
            // on le renvois sur la page index grace au doublon=true la modale restera ouverte avec un 
            //message l'identifiant est déjà existant
        } else {
            //Sinon si le premier mot de passe est egale au deuxieme mot de passe 
            if ($password1 == $password2) {
                // Si le mot passe possede bien les critère de la fonction preg-match
                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $password1)) {
                    // Tu protège en t'arrétant une seconde avant de continué la suite
                    sleep(1);
                    //Tu peux lancer la fonction d'insertion de l'utilisateur
                    insert_user($last_name, $first_name, $connection_identifier, $passe_hash);
                    header('location:index?newaccount-success');
                    // redirection sur la page index le message newaccount-success permet de mettre un message sur la modale 
                    //pour prevenir l'utilisateur que le compte à bien été créé
                    //ob_start();
                    exit();
                    // on stop le script
                    //sinon On redirige sur l'index avec le message erreur de sécurité ce qui affichera un message sur la modale de l'utlisateur
                } else {
                    header('location:index?erreur-securite');
                }
                //sinon si les deux mot de passe ne sont pas identique On redirige sur l'index avec le message erreur-password 
                //ce qui affichera un message sur la modale de l'utlisateur les mots de passe sont incorrecte
            } else {
                header('location:index?erreur-password');
            }
        }
    }


    if (@$connectionModal) {
        $connection_identifier = $_POST["connection_identifier"];
        $password = $_POST["password_connect"];
        sleep(1);
        verif_login($connection_identifier, $password);
    }
}

// si il y a un clic sur le bouton envoyer de la modale mot de passe oublié
if (isset($_POST["forgot-pass"])) {


    @$adresse_mail = htmlspecialchars($_POST['login_user']);


    if (isset($adresse_mail)) {

        @$recup_id_pass_forgot = recup_id_pass_forgot($adresse_mail);
        $var1 = aesEncrypt($recup_id_pass_forgot);
        //echo $var1;

        if ($adresse_mail == motdepasse_oublie($adresse_mail)) {
            sleep(1);
            header('location:https://www.projetfinalelgueta.fr/pages/mail/envoi_mail_pwd_forgot.php?newpwd-id=' .  $var1 . '&adresse_mail=' . $adresse_mail);
            //echo 'ok tu passes';
        } else {
            //echo "L'adresse mail n'existe pas.";
            header('Location: index.php?erreurlog=true');
        }
    }
}

// si y a un id dans l'url je décripte et je le compare à la base de donnée.
if (isset($_GET["newpwd-id"])) {
    $id_user = $_GET["newpwd-id"];

    $var2 = aesDecrypt($id_user);
    //echo $var2;
    // var_dump($var2);
    // die();


    if (verification_id($var2)) {
        //echo 'ok tu passes';
        //echo  $verification_id;
    } else {
        header('location:index.php?pwd-error');
    }
}


// else {
//     header('location:index.php?pwd-error');  
// }


// $verification_id = verification_id($var2);
// var_dump($verification_id);


if (isset($_POST)) {

    @$mot_de_passe1 = htmlspecialchars($_POST['mot_de_passe1']);
    @$mot_de_passe2 = htmlspecialchars($_POST['mot_de_passe2']);
    @$modifier_pwd = htmlspecialchars($_POST['modify_pwd']);
    @$pass_hash =  decrypt($pwd_user);
    @$id_custom =  $_POST['id_custom'];



    if ($modifier_pwd) {

        if ($mot_de_passe1 == $mot_de_passe2) {

            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $mot_de_passe1)) {
                sleep(1);
                //echo 'ok mdp modifié';
                modifier_motdepasse($id_custom, $mot_de_passe1);
                header('location:index.php?newpwd-success');
                //ob_start();
                exit();
            } else {
                echo 'erreur';
                $erreur =  'Niveau de sécurité trop faible';
            }
        } else {
            echo 'erreur';
            $erreur = 'Vos mots de passe ne correspondent pas, merci de retaper votre mot de passe';
        }
    }
}

@$recup_product = recup_all_product($id_user);


//pour que les css ne passe pas en memoire
$unique = uniqid();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="L'association Jardins Naturels Vivriers vous présente son site internet. Cesite a pour but de présenter le Jardin Vivrier de Boisbonne ainsi que de l'association. Boutique pour vendre des produits du jardin et des producteurs locaux. Blog du jardin avec des actualités.">

    <link rel=canonical href="http://www.projetfinalelgueta.fr/index.php">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" async defer>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <!-- Fontawesome-->
    <script src="https://kit.fontawesome.com/f8af9f7155.js" crossorigin="anonymous" async defer></script>

    <!--script_captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>



    <!-- googlefont-->

    <link href="https://fonts.googleapis.com/css?family=Aclonica|Rochester|Dosis|Niconne|Emilys+Candy|Parisienne&display=swap" rel="stylesheet">
    <!-- <link rel='stylesheet' href="../css/style.css?un=<?php echo $unique ?>"> -->
    <link rel="preload" href="../css/style.css?un=<?php echo $unique ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="../css/style.css?un=<?php echo $unique ?>"></noscript>

    <link rel="stylesheet" href="../css/glide.core.min.css">
    <!-- <link rel="stylesheet" href="../css/glide.theme.min.css"> -->
    <link rel="shotcut icon" href="../photos/logo_svg/favicon.ico" type="image/x-icon" />
    <title>Jardins Naturels Vivriers</title>
</head>

<body>
    <!--=====================================================================
 * NAVBAR CÔTÉ CLIENT 1
 */ =================================================================-->

    <nav class="navbar navbar-expand-xl navbar-light bg-light" id="nav_header1">
        <a class="navbar-brand logo" href="index.php"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav lien_ul1 ">
                <!--==========================================
                        AFFICHAGE DU LIEN DE l'ACCUEIL 
                    ==========================================-->
                <li class="nav-item lien_li1">
                    <a class="nav-link lien1 " href="index.php">Bienvenue sur le site qui fait du bien !</a>
                </li>
            </ul>
            <!--==========================================
                        AFFICHAGE DU LIEN ESPACE PERSONNEL 
                    ==========================================-->
            <ul class="navbar-nav lien_ul1 ">
                <li class="nav-item lien_li1">
                    <a class="nav-link lien1 user" href="index.php" name="connect" data-toggle="modal" data-target=".modalConnect">Espace personnel <img class="" width="20" src="../photos/icons/picto-espace-perso.png" alt="logo-espace-perso"></a></li>

                <!--==========================================
                        AFFICHAGE DU LIEN ADHERER 
                    ==========================================-->
                <li class="nav-item lien_li1">
                    <a class="nav-link lien1 " href="index.php" data-toggle="modal" data-target=".modalRegister">Adhérer <img class="" width="20" src="../photos/icons/picto-adherer.png" alt="logo-adherer"></a>
                </li>


            </ul>


        </div>
    </nav>

    <!--=====================================================================
 * NAVBAR CÔTÉ CLIENT 2
 */ =================================================================-->

    <nav class="navbar navbar-expand-xl navbar-light bg-light" id="nav_header">
        <a class="navbar-brand logo" href="index.php"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav lien_ul ">

                <!--==========================================
                        AFFICHAGE BOUTON POUR ADMIN
                    ==========================================-->
                <?php if (@$_SESSION["role"] == 5) { ?>
                    <li><a class="nav-item nav-link " href="admin.php"><input type="submit" class="btn btn-outline-success" name="compte" value="BackOffice"></a></li>
                <?php } ?>
                <!--==========================================
                        AFFICHAGE DES CATEGORIES
                    ==========================================-->
                <?php $i = 1; ?>
                <?php foreach ($categoryMenu as $row) { ?>
                    <li class="nav-item lien_li">
                        <a class="nav-link lien<?php echo @$active[$i]
                                                ?>" href="<?php echo @$row->name_category_page . ".php" ?>?id=<?php echo @$row->id_category_page ?>"><?php echo @$row->title_category_page ?></a>
                    </li>
                <?php $i++;
                } ?>
                <!--==========================================
                        AFFICHAGE DU LIEN ADHERER 
                    ==========================================-->
                <li class="nav-item lien_li">
                    <a class="nav-link lien " href="index.php" data-toggle="modal" data-target=".modalRegister">Adhérer</a>
                </li>

                <!--==========================================
                        AFFICHAGE DU LOGO
                    ==========================================-->
            </ul>
            <!--BARRE DE RECHERCHE  -->
            <ul class="navbar-nav lien_ul ">
                <!-- <li>
                    <form class="form-inline my-2 my-lg-0 form_search" action="recherche.php" method="post">
                        <input class="form-control searchInput" type="text" placeholder="Search" aria-label="Search" name="recherche">
                        <button class="search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li> -->
                <!--==============================================================
                 Récupération de la session pour inscrire le prénom dans la navbar
                 ==================================================================---->

                <?php if (@$_SESSION["id_user"]) { ?>

                    <li>
                        <p class="bienvenue">Bienvenue <?php echo @$_SESSION["first_name"] ?></p>
                    </li>

                    <!--==============================================================
                 Switch des boutons compte, connection, deconnection, panier
                 ==================================================================---->

                    <li><a class="nav-item nav-link " href="compte.php"><input type="submit" class="btn btn-outline-success" name="compte" value="Mon compte"></a></li>
                    <li><a class="nav-item nav-link" href="deconnection.php"><input type="submit" class="btn btn-outline-info" name="deconnexion" value="Déconnexion"></a></li>

                    <!-- PANIER DE BARRE DE NAVIGATION -->
                    <li><a class="nav-item nav-link cart" href="cart.php"><i class="fas fa-shopping-basket fa-3x"></i></a></li>
                    <?php foreach ($recup_product as $row) { ?>
                        <?php @$total_panier += $row->quantity ?>

                    <?php } ?>

                    <span><?php echo $total_panier; ?></span>
                <?php } else { ?>
                    <!-- FIN DU BOUTON PANIER -->

                    <li><button type="button" class="facebook" name="facebook"><img class="" width="50" src="../photos/logo_svg/picto-facebook-blanc.png" alt="logo-facebook"> </button>

                    </li>

                    <!-- <li><a class="nav-item nav-link" href="user.php"><input type="submit" class="btn btn-outline-info"
                            name="creation" value="Créer un compte"></a></li> -->


                <?php } ?>

            </ul>
        </div>
    </nav>

    <!-- <div class="d-flex justify-content-end barre_recherche">

<form class="form-inline my-2 my-lg-0 form_search" action="recherche.php" method="post">
                    <input class="form-control searchInput" type="text" placeholder="Search"
                        aria-label="Search" name="recherche" >
                    <button class="search" type="submit"><i class="fas fa-search"></i></button>
                </form>
                
</div> -->



    <!-- debut du container -->
    <!-- <div class="container-fluid header"> -->