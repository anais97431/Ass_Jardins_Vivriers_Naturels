<?php

require "header.php";
require "../fonctions/fonctions_products.php";
require "../fonctions/fonctions_images.php";



@$id_product = $_GET["id_product"];
@$id_category_shop = $_GET["id"];
@$id_user = $_SESSION["id_user"];



@$price_product = htmlspecialchars($_POST["price"]);
@$quantity_cart = htmlspecialchars($_POST["quantity_cart"]);
@$add_cart = htmlspecialchars($_POST["addcart"]);


if ($add_cart) {

    insert_cart($id_product, $id_user, $price_product, $quantity_cart);
}





// recup de la fonction recup_all_product_by_id et de la fonction recup_all_picture
$product = recup_all_products_by_id($id_product);
$recup_pictures = recup_all_picture($id_product);

// $recup_product = recup_products();



// $recup_product = recup_products_by_id($id_category)
?>

<div class="row mr-0 mx-0 ligne_product">


    <?php foreach ($product as $row) { ?>
        <?php $liste_quantity = liste_quantity(@$row->id_product); ?>
        <div class="col-md-2 offset-5 images">




            <div class="container">

                <?php $picture = recup_picture(@$row->id_product);
                ?>
                <img id="expandedImg" class="img-product" width="250" src="../uploads/<?php echo @$picture->title_picture ?>" alt="produits">
                <?php foreach ($recup_pictures as $row) { ?>

                    <img class="img-product img-mini" src="../uploads/<?php echo @$row->title_picture ?>" width="80" alt="photo produit" onclick="myFunction(this);">
                <?php } ?>


            </div>
        </div>



        <div class="col-md-4 offset-1 description">
            <form class="form-product" action="product.php?id=<?php echo $id_category_shop ?>&id_product=<?php echo $id_product ?>" method="post">
                <div class="container">
                    <h2 class="title_product"><?php echo stripslashes($row->title_product) ?></h2>
                    <p class="description_product"><?php echo stripslashes($row->description_product) ?> </p>
                    <p class="prix"><?php echo "Prix : " . $row->price_product . " euros" ?></p>
                    <div class="select_quantity">
                        <label for="" class="label_quantity">Quantité : </label><br>
                        <input min="1" max="<?php echo $row->stock ?>" type="number" name="quantity_cart" class="quantity" value="<?php echo $row->quantity ?>">
                    </div>

                    <?php if (@$_SESSION['id_user']) { ?>

                        <?php if ($row->stock == 0) { ?>
                            <button type="button" name="" value="" class="btn-home btnbloc btn-ajout-panier-product" data-toggle="modal" data-target=".outOfStock">Ajouter au panier</button>
                        <?php } else { ?>

                            <button type="submit" name="addcart" value="addcart" class="btn-home btnbloc btn-ajout-panier-product">Ajouter au panier</button>
                        <?php } ?>
                    <?php } else { ?>

                        <button type="button" id="btnLoginProduct" name="connect" data-toggle="modal" data-target=".modalConnect">Ajouter au panier</button>
                    <?php } ?>

                </div>

                <input type="hidden" name="price" value="<?php echo $row->price_product ?>">


            </form>
        </div>
    <?php } ?>

</div>






<div class="container-fluid bandeau_info">
    <div class="row bandeau_horaires">
        <div class="col-md-11 offset-1 logo1">
            <p>La récupération des commandes se fait le mercredi au jardin !</p>

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
<?php
include "footer.php"; ?>