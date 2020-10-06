<?php
require "header.php";

require "../fonctions/fonctions_images.php";

require "../fonctions/fonctions_products.php";

require "navbar.php";

// var_dump(pathinfo('/'));

//include(realpath('/fonctions.php'));
// echo $_SERVER['DOCUMENT_ROOT'];
// die();

// include $_SERVER['DOCUMENT_ROOT'] . "/fonctions.php";
// require_once realpath(dirname(__FILE__).'/fonctions.php');
// define('ROOT', $_SERVER['DOCUMENT_ROOT']);
// echo ROOT;
// include_once(ROOT."/fonctions.php");

// $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
// $final_url = substr($url, 0, -21);

// echo $final_url.'/header.php'; 

@$id_product = $_POST["id_product"];
@$id_category_shop = $_GET["id"];
//include 'localhost/projet_final/emplettes_solidaires/emplettes/pages';

@$id_user = $_SESSION["id_user"];
@$price_product = htmlspecialchars($_POST["price"]);
@$quantity_cart = htmlspecialchars($_POST["quantity_cart"]);
@$add_cart = htmlspecialchars($_POST["addcart"]);

if ($add_cart) {

        insert_cart($id_product, $id_user, $price_product, $quantity_cart);
     
}

$recup_category = select_category_achat();

// $recup_product = recup_products();
// var_dump($recup_product);




?>



<!-- <div class="img1">

</div> -->
<div class="row mr-0 mx-0 info">
    
        <div class="container">
        <h3 class="display-4 titre">GROUPEMENT D'ACHAT</h3>
        <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, doloremque perferendis quos hic facere dolores nulla in fugiat nam ipsum dolorem ut beatae unde architecto aliquam natus adipisci. Enim, dicta?

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem laboriosam praesentium harum autem alias et rem rerum! Laudantium ullam consequuntur rerum ipsum natus nisi quaerat libero id fugit. Impedit, quam!
        </p>
</div>
    
</div>


<!-- <div class="container-fluid center"> -->
    <div class="row mr-0 mx-0 center">
    
        <?php foreach ($recup_category as $row) { ?>

        <div class="col-lg-3 col-md-6 col-12 col_card_achat">
        
            <div class="card-body corps_card corps_achat_index">
                <div class="card card_index card_achat_index">
                <a href="category.php?id=<?php echo $row->id_category_shop ?>"><img src="../uploads/<?php echo $row->img_category_shop ?>" class="card-img-top" alt="..."></a><br>
                    <h5 class="card-title"><?php echo $row->title_category_shop ?></h5>
                    
                    
                        <button class="voirCat" type="submit" value="Voir le produit"
                                    aria-expanded="false"><a href="category.php?id=<?php echo $row->id_category_shop ?>">Voir cette
                        catégorie</a></button>
                                    
                </div>

            </div>
        </div>
        <?php } ?>
    </div>
<!-- </div> -->


  <!-- <div class="container nouveaute"><h5>Nos nouveauté :</h5></div>

 <div class="container-fluid center">
    <div class="row">
        <?php foreach ($recup_product as $row2) { ?>
            <div class="col-lg-4 col-md-6 col-12">
            <div class="card-body corps_card">
            
                <div class="card card_index">
                    <?php $picture = recup_picture(@$row2->id_product);
                    ?>
                    <img src="../uploads/<?php echo @$picture->title_picture ?>" class="card-img-top" alt="">

                    <h5 class="card-title"><?php echo $row2->title_product ?></h5>
                    <p class="card-text">Venez découvrir cette variété !</p>
                    <p class="card-text"><?php echo $row2->price_product . " €" ?></p>
                   
                   
                     <?php if (@$_SESSION['id_user']) { ?>

                        <?php if ($row->stock == 0) { ?>
                            <button type="button" name="" value="" class="btn-home btnbloc btn-ajout-panier" data-toggle="modal" data-target=".outOfStock">Ajouter au panier</button>
                        <?php } else { ?>

                            <button type="submit" name="addcart" value="addcart" class="btn-home btnbloc btn-ajout-panier">Ajouter au panier</button> 
                            <?php } ?>
                            <?php }else{ ?>
                        <button type="button" class="btnLogin" name="connect"><a href="login.php">Ajouter au panier</button>
                            <?php } ?>
                               <button class="envoiProduct" type="submit" name="envoiProduct" value="Voir le produit"
                                    aria-expanded="false"><a href="product.php?id_product=<?php echo $row2->id_product ?>&id=<?php echo $row2->id_category_shop?>">Voir le produit
                                    </a></button>
                    </div>
                </div>

                
                </div>


       
        <?php } ?>
        </div>
    </div> -->
 

<div class="container-fluid bandeau_info">
    <div class="row bandeau_horaires">
        <div class="col-md-11 offset-1 logo1">
            <p>Les commandes ce font le mercredi, et la récupération le mercredi suivant au jardin !</p>

        </div>
    </div>
    <div class="row bandeau">
        <div class="col-md-3 offset-1 logo1">

            <img width="50" src="../photos/logo_svg/chronometer.svg" alt="chronomètre">
            <p>Le jardin commande en gros au producteur!</p>
        </div>
        <div class="col-md-3 offset-1 logo2">
            <img width="50" src="../photos/logo_svg/paypal.svg" alt="paypal">
            <p>Paiement sécurisé avec paypal !</p>
        </div>
        <div class="col-md-3 offset-1 logo3">
            <img width="50" src="../photos/logo_svg/support.svg" alt="paypal">
            <p>Une question sur un produit, n'hésitez pas contactez nous !</p>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>