<?php
ob_start();
session_start();

// rafraichissement page



 require "conect.php";

 require "../fonctions/fonctions_category.php";


 
$categoryMenu = select_category_header();


@$menu = htmlspecialchars($_GET["menu"]);
switch ($menu) {
    case 1:
        $active_1 = " active";
        break;
    case 2:
        $active_2 = " active";
        break;
    case 3:
        $active_3 = " active";
        break;  
    default;
}


if ($_POST) {
    
    @$recherche = htmlspecialchars($_POST["recherche"]);
    @$compte = htmlspecialchars($_POST["compte"]);
    @$deconnexion = htmlspecialchars($_POST["deconnexion"]);
    @$creation = htmlspecialchars($_POST["creation"]);
    // @$connection = htmlspecialchars($_POST["connection"]);


    // if ($compte) {
    //     header('Location: compte.php');
    // }

    // if ($deconnexion) {
    //     header('Location: deconnection.php');
    // }


    // if ($creation) {
    //     header('Location: user.php');
    // }

    // if ($connection) {
    //     header('Location: login.php');
    // }
}
//pour que les css ne passe pas en memoire
$unique = uniqid();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jodit -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.2.65/jodit.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.2.65/jodit.min.js"></script>

    <!-- Fontawesome-->
    <script src="https://kit.fontawesome.com/f8af9f7155.js" crossorigin="anonymous"></script>

    <!--script_captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- googlefont-->
    <link
        href="https://fonts.googleapis.com/css?family=Aclonica|Rochester|Courgette|Niconne|Emilys+Candy|Parisienne&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css?un=<?php echo $unique ?>">

    <title>Document</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top admin_header">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <div class="dropdown">
  <button class="dropbtn">Nous connaîtres</button>
  <div class="dropdown-content">
    <a href="admin_nous_connaitre.php">Nous connaitres</a>
    <a href="admin_le_jardin.php">Le jardin</a>
    <a href="admin_les_jardiniers.php">Les jardiniers volants</a>
    <a href="admin_projet_asso.php">Projet associatif</a>
    <a href="admin_benevoles.php">Bénévoles, chantiers collectifs</a>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn">Sensation Nature</button>
  <div class="dropdown-content">
    <a href="admin_sensation_nature.php">Sensation nature</a>
    <a href="admin_les_cherubins.php">Les chérubins</a>
    <a href="admin_ateliers.php">Ateliers, formations</a>
    <a href="admin_conferences.php">Conférences, sorties</a>
  </div>
</div>


<div class="dropdown">
  <button class="dropbtn">Café associatif</button>
  <div class="dropdown-content">
    <a href="admin_cafe.php">Café associatif</a>
    <a href="admin_convivialite.php">Convivialité, se renconter</a>
    <a href="admin_echanger.php">Échanger débattre</a>
    <a href="admin_agir.php">Agir collectivement</a>
  </div>
</div>


<div class="dropdown">
  <button class="dropbtn">Emplettes solidaires</button>
  <div class="dropdown-content">
    <a href="admin_emplettes.php">Emplettes solidaires</a>
    <a href="admin_boutique.php">Groupement d'achat</a>
    <a href="admin_achat_raisonne.php">Achat raisonné, consommer mieux</a>
    <a href="admin_vente.php">Vente directe, circuits courts</a>
  </div>
</div>





  </div>
</nav>




    <!-- debut du container -->
    <!-- <div class="container-fluid header"> -->