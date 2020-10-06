<?php

include "header.php";
require "../fonctions/fonctions_products.php";
require "../fonctions/fonctions_images.php";


@$id_product = $_POST["id_product"];
@$id_category_shop = $_GET["id"];


@$id_user = $_SESSION["id_user"];
@$price_product = htmlspecialchars($_POST["price"]);
@$quantity_cart = htmlspecialchars($_POST["quantity_cart"]);
@$quantity_cart = htmlspecialchars($_POST["quantity_cart"]);
@$add_cart = htmlspecialchars($_POST["addcart"]);




if ($add_cart) {

        insert_cart($id_product, $id_user, $price_product, $quantity_cart);
     
}


$recup_product = recup_products_by_id($id_category_shop);





// var_dump($recup_des_articles);
?>



<!-- <div class="container-fluid container_cat">


    <div class="row card_cat_row">
        <?php foreach ($recup_product as $row) { ?>

        <?php $picture = recup_picture(@$row->id_product); ?>

        <div class="card mb-3 card_cat_corps">

            <div class="row no-gutters card_cat">
                <div class="col-lg-6 col-md-6 col-6 img">
                    <img width="200"  src="../uploads/<?php echo @$picture->title_picture ?>" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-6 card_cat_contenu">
                
                    <form class="form-product"
                        action="category.php?id=<?php echo $id_category_shop ?>"
                        method="post">
                        
                        <div class="card-body body_category_product">
                        
                            <h5 class="title_cat"><?php echo stripslashes($row->title_product) ?></h5><br>
                            <div class="row category_product_info">
                            <p class="price_cat"><?php echo $row->price_product . " €" ?></p>
                            <div class="select_quantity">
                                <label for="" class="label_quantity">Quantité : </label>
                                <input min="1" max="<?php echo $row->stock ?>" type="number" name="quantity_cart"
                                    class="quantity" value="<?php echo $row->quantity ?>">
                                
                            </div>
                            </div>
        

                            
                           <div class="row">

                                <?php if (@$_SESSION['id_user']) { ?>

                        <?php if ($row->stock == 0) { ?>
                            <button type="button" name="" value="" class="btn-home btnbloc btn-ajout-panier" data-toggle="modal" data-target=".outOfStock"><i class="fas fa-shopping-basket"></i></button>
                        <?php } else { ?>

                            <button type="submit" name="addcart" value="addcart" class="btn-home btnbloc btn-ajout-panier"><i class="fas fa-shopping-basket"></i></button> 
                            <?php } ?>
                            <?php }else{ ?>
                        <button type="button" class="btnLogin" name="connect" data-toggle="modal" data-target=".modalConnect"><i class="fas fa-shopping-basket"></i></button>
                            <?php } ?>
                           

                        <a class="eye_product" href="product.php?id_product=<?php echo $row->id_product ?>&id=<?php echo $row->id_category_shop?>" value=""><i class="far fa-eye"></i></a>

                            <input type="hidden" name="price" value="<?php echo $row->price_product ?>">
                            <input type="hidden" name="id_product" value="<?php echo $row->id_product ?>">
                                </div>
                                
                    </form>

            
                    
                     
                    -- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --
                </div>

            </div>
        </div>

        <?php } ?>
    </div>

    </div> -->


    <!-- NOUVELLE CARD -->

    <!-- <div class="container-fluid center"> -->
    <div class="row mr-0 mx-0 center_catProduct">
    
    <?php foreach ($recup_product as $row) { ?>

<?php $picture = recup_picture(@$row->id_product); ?>


        <div class="col-lg-3 col-md-6 col-12">
        
        <form class="form-product"
                        action="category.php?id=<?php echo $id_category_shop ?>"
                        method="post">
            <div class="card-body corps_card corps_achat_catProduct">
                <div class="card card_index card_achat_catProduct">
                <h5 class="card-title card_catProduct_title"><?php echo $row->title_product ?></h5>
                <a href="product.php?id_product=<?php echo $row->id_product ?>&id=<?php echo $row->id_category_shop?>" value=""><img width="200"  src="../uploads/<?php echo @$picture->title_picture ?>" alt=""></a><br>
                    
                <div class="row category_product_info">
                            <p class="price_cat"><?php echo $row->price_product . " €" ?></p>
                            
                                <!-- <label for="" class="label_quantity">Quantité : </label> -->
                                <input min="1" max="<?php echo $row->stock ?>" type="number" name="quantity_cart"
                                    class="quantity" value="<?php echo $row->quantity ?>">
                                
                           
                            </div>
        
                                        
        
                            <div class="row">

<?php if (@$_SESSION['id_user']) { ?>

<?php if ($row->stock == 0) { ?>
<button type="button" name="" value="" class="btn-home btnbloc btn-ajout-panier" data-toggle="modal" data-target=".outOfStock"><i class="fas fa-shopping-basket"></i></button>
<?php } else { ?>

<button type="submit" name="addcart" value="addcart" class="btn-home btnbloc btn-ajout-panier"><i class="fas fa-shopping-basket"></i></button> 
<?php } ?>
<?php }else{ ?>
<button type="button" class="btnLogin" name="connect" data-toggle="modal" data-target=".modalConnect"><i class="fas fa-shopping-basket"></i></button>
<?php } ?>


<a class="eye_product" href="product.php?id_product=<?php echo $row->id_product ?>&id=<?php echo $row->id_category_shop?>" value=""><i class="far fa-eye"></i></a>

<input type="hidden" name="price" value="<?php echo $row->price_product ?>">
<input type="hidden" name="id_product" value="<?php echo $row->id_product ?>">
</div>

                                    
                </div>

            </div>
</form>
        </div>
        <?php } ?>
    </div>
<!-- </div> -->







<?php include "footer.php"
?>