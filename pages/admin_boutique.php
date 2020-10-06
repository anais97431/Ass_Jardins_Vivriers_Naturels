<?php

require "header_admin.php";
require "navbar_vertical.php";
require "../fonctions/upload.php";
require "../fonctions/upload_cat.php";
require "../fonctions/fonctions_products.php";
if (isset($_SESSION["role"]) != 5) {

    header('Location: login.php');
}




// var_dump($_POST);


//$liste_cat = liste_cat();


// var_dump($liste_titre);
$resultatCat = array();


if (isset($_POST)) {

    // var_dump($_POST);

    // recup des post
    // il faut proteger les posts




    @$id_product = htmlspecialchars($_POST["id_product"]);
    @$id_category_shop = htmlspecialchars($_POST["id_category_shop"]);
    @$title_category_shop =  htmlspecialchars($_POST["title_cat"]);
    @$title_product = htmlspecialchars($_POST["title_product"]);
    @$id_user = htmlspecialchars($_POST["id_user"]);
    @$description_product =  $_POST["description_product"];
    @$add_product =  htmlspecialchars($_POST["add_product"]);
    @$add_category_shop =  htmlspecialchars($_POST["add_category_shop"]);
    @$update_category =  htmlspecialchars($_POST["update_category_shop"]);
    @$update_product = htmlspecialchars($_POST["update_product"]);
    @$disabled_product =  htmlspecialchars($_POST["delete_product"]);
    @$img_category_shop  = $_FILES;
    @$price_product = htmlspecialchars($_POST["price"]);
    @$stock = htmlspecialchars($_POST["stock"]);
    @$active = htmlspecialchars($_POST["active"]);
    @$photos = htmlspecialchars($_POST["photos[]"]);



    //  =================================================================================================================
    //  * ********************************* APPEL DES FONCTIONS POUR LA PARTIE BOUTIQUE *****************
    //  */ ==============================================================================================================

    // si on clic sur le bouton disabled_product: permet l'appel de la fonction disabled_product pour desactiver le produit

    if ($disabled_product) {
        disabled_product($id_product);
    }

    // si on clic sur la checkbox: permet l'appel de la fonction active_product pour activer le produit
    if ($active) {
        active_product($id_product);
    }


    // si on selectionne un produit dans le select: permet l'appel de la fonction produit_unique pour appeler un produit ainsi que les images associées 

    if (isset($_POST["id_product"])) {
        $unique_product = unique_product($id_product);
        $resultatPicture = unique_picture($id_product);
    }

    // si on selectionne une categorie dans le select: permet l'appel de la fonction select_category pour appeler une categorie de produit dans l'input
    if (isset($_POST["id_category_shop"])) {
        $resultatCat = select_category($id_category_shop);
    }



    //var_dump($article_unique);

    // Protege l'entrée d'un produit
    //si on clic sur le bouton ajouter: permet l'appel de la fonction add_product et insert_tags pour ajouter dans la base un nouveau produit et une image
    if ($add_product) {
        $id_product = add_product(addslashes($title_product), addslashes($id_category_shop), addslashes($description_product), addslashes($price_product), addslashes($stock));
        img_load($id_product);
    }
    if ($add_category_shop) {
        add_category_shop(addslashes($title_category_shop));
        img_load_cat($id_category_shop);
    }

    // si on clic sur le bouton update_product: permet l'appel de la fonction updateproduct pour modifier un produit 
    // Protege l'entrée
    if ($update_product) {
        update_product(addslashes($id_product), addslashes($id_category_shop), addslashes($title_product), addslashes($price_product), addslashes($description_product), addslashes($stock), addslashes($active));
        img_load($id_product);
        $resultatPicture = unique_picture($id_product);
    }

    // si on clic sur le bouton update_category: permet l'appel de la fonction update_category pour modifier une category 
    if ($update_category) {
        update_category($id_category_shop, addslashes($title_category_shop), $img_category_shop);
        img_load_cat($id_category_shop);
        //var_dump(img_load_cat($id_category));
    }
}
// permet de faire apparaite les titres des articles
$liste_product =  liste_product();

// permet de faire apparaite les categories des articles
$liste_category_produit = liste_title_cat();
?>





<!--=================================================================================================================
 * ************************************************ PARTIE BOUTIQUE **************************************************
 * COLLAPSE POUR LES CATEGORIES DE PRODUITS
 */ ==================================================================================================================-->
<!-- <div class="row mr-0 mx-0 ligneTitreBoutique">
 <h1 class="titrePartie">Partie Boutique :</h1><br><br>
 </div> -->

<div class="main">
    <div class="row mr-0 mx-0">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <!-- PARTIE CATEGORIE DU GROUPEMENT D'ACHAT -->
            <div class="collapse_category" id="collapseCategory">
                <div class=" card_col_category">
                    <h3>ENTRER UNE CATEGORIE DE PRODUIT</h3>

                    <form class="form-admin" action="admin_boutique" method="post" id="target1" enctype="multipart/form-data">

                        <div class="form-group">
                            <!-- LISTE DES CATEGORIES -->
                            <label class="formulaire" for="">Choix de la catégorie*</label><br>
                            <select name="id_category_shop" id="id_category_shop" onChange="submit()" class="form-control">
                                <option value="">Choix catégorie</option>
                                <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                                <?php foreach ($liste_category_produit as $row) { ?>
                                    <option value="<?php echo $row->id_category_shop; ?>" <?php if ($row->id_category_shop == @$_POST["id_category_shop"]) {
                                                                                                echo " selected";
                                                                                            } ?>>
                                        <?php echo stripslashes($row->title_category_shop); ?>
                                    </option>
                                <?php } ?>

                            </select>

                        </div>
                        <br>
                        <div class="form-group">
                            <label class="formulaire" for="">Ajouter une categorie*</label><br>
                            <input type="text" value="<?php echo stripslashes(@$resultatCat->title_category_shop); ?>" name="title_cat" class="form-control" required>
                        </div>

                        <br>
                        <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
                        <input type="file" name="photos[]" multiple><br><br>

                        <img width="100" src="../uploads/<?php echo @$resultatCat->img_category_shop; ?>" alt=""><br>
                        <?php echo @$resultatCat->img_category_shop; ?><br>




                        <?php if (@$id_category_shop) { ?>


                            <input type="submit" class="btn btn-warning" name="update_category_shop" value="Modifier">

                        <?php } else { ?>
                            <input type="submit" class="btn btn-info" name="add_category_shop" value="Ajouter">
                        <?php } ?>
                    </form>
                </div>
            </div>


        </div>

        <!-- FIN DES CATEGORIES -->
        <!--=====================================================================
 * COLLAPSE POUR LES PRODUITS
 */ =================================================================-->
        <div class="col-xl-7 offset-1 col-lg-7offset-1 col-md-12 col-sm-12 col-12">

            <div class="collapse_produit" id="collapseProduits">
                <div class=" card_col_produit">
                    <h3>ENTRER UN PRODUIT</h3>
                    <br>
                    <!-- Formulaire permettant de selectionner les titre, les catégories et de creer de nouveaux articles -->
                    <form class="form-admin" action="admin_boutique" method="post" id="target" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Choix du titre*</label>
                                <!-- LISTE DES TITRES -->
                                <select name="id_product" id="id_product" onChange="submit()" class="form-control">
                                    <option value="">Choix du titre</option>
                                    <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                                    <?php foreach ($liste_product as $row) { ?>
                                        <option value="<?php echo $row->id_product; ?>" <?php if ($row->id_product == @$_POST["id_product"]) {
                                                                                            echo " selected";
                                                                                        } ?>>
                                            <?php echo stripslashes($row->title_product); ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Choix des categories*</label>
                                <select name="id_category_shop" id="id_category" class="form-control" required>
                                    <option value="">Choix de votre catégorie</option>
                                    <?php foreach ($liste_category_produit as $row) { ?>

                                        <option value="<?php echo $row->id_category_shop; ?>" <?php if ($row->id_category_shop == @$unique_product->id_category_shop) {
                                                                                                    echo " selected";
                                                                                                } ?>><?php echo stripslashes($row->title_category_shop); ?></option><?php } ?>
                                </select>
                            </div>
                        </div>

                        <br>
                        <br>
                        <!--Titre article: le echo permet de recupérer la valeur qui est dans le base de donnée -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTitreProduit">Titre du produit*</label>
                                <input type="text" value="<?php echo stripslashes(@$unique_product->title_product); ?>" name="title_product" class="form-control" id="inputTitreProduit" required>
                            </div>
                            <!-- Article le echo permet de recupérer la valeur qui est dans le base de donnée-->
                            <div class="form-group col-md-6">
                                <label for="">Description complète du Produit*</label>
                                <textarea name="description_product" id="editor" class="form-control" cols="30" rows="10"><?php echo stripslashes(@$unique_product->description_product); ?></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPrix">Prix du produit</label>
                                <input type="text" value="<?php echo stripslashes(@$unique_product->price_product); ?>" class="form-control" name="price" id="inputPrix">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputStock">Stock produit</label>
                                <input type="text" value="<?php echo stripslashes(@$unique_product->stock); ?>" class="form-control" name="stock" id="inputStock">
                            </div>
                        </div>

                        <!--Permet d'afficher id_user qui est connecté (cacher avec le type hidden)-->
                        <input type="hidden" name="id_user" class="form-control" value="<?php echo @$_SESSION["id_user"]; ?>" required><br>

                        <!--Permet de coché si on veut activer ou désactiver le produit -->

                        <?php if (@$unique_product->active == 1) {
                            $checked1 = " checked ";
                        } else {
                            $checked1 = "";
                        } ?>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" id="customCheck1" name="active" <?php echo stripslashes(@$checked1) ?>>
                            <label class="custom-control-label" for="customCheck1">Rendre le produit visible sur le site</label>
                        </div>
                        <br>
                        <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
                        <input type="file" name="photos[]" multiple><br><br>
                        <div>
                            <?php if (@$id_product) { ?>
                                <!--Via le foreach on accède à $image_unique sous forme de "tableau" qu'on segmente ensuite en ligne (row)-->
                                <?php foreach (@$resultatPicture as $row) { ?>
                                    <!--Et dans le row on va chercher le champ name_image_product pour l'afficher dans une balise image via un echo-->
                                    <img width="100" src="../uploads/<?php echo @$row->title_picture ?>" alt="">

                                <?php } ?>
                            <?php } ?>

                        </div>
                        <!-- si id_article est vrai on affiche les boutons modifier et supprimer sinon on affiche le bouton ajouter-->
                        <?php if (@$id_product) { ?>


                            <input type="submit" class="btn btn-warning" name="update_product" value="Modifier">


                            <input type="submit" id="supprimer" class="btn btn-danger" name="delete_product" value="Supprimer">
                        <?php } else { ?>
                            <input type="submit" class="btn btn-info" name="add_product" value="Ajouter">
                        <?php } ?>





                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Script JODIT pour l'editeur de texte-->
<script>
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];




    var editor = new Jodit('#editor', {
        uploader: {
            url: baseUrl + '/connector/index.php?action=fileUpload'
        },

        filebrowser: {
            ajax: {
                url: baseUrl + '/connector/index.php'
            }
        },
        "buttons": "|,source,bold,strikethrough,underline,italic,|,ul,ol,|,outdent,indent,|,font,fontsize,brush,paragraph,|,video, image,table,link,|,align,undo,redo,\n,hr,eraser,copyformat,|,symbol"

        //"buttons": "|,source,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,brush,paragraph,|,image,file,video,table,link,|,align,undo,redo,\n,cut,hr,eraser,copyformat,|,symbol,fullsize,selectall,print,about"               
    });
</script>


<?php require "footer_admin.php"; ?>

<!-- Script permettant l'affichage de la fenetre de confirmation si on clic sur le bouton supprimer-->
<script>
    $(document).ready(function() {

        $("#supprimer").on("click", function(e) {


            if (confirm("voulez-vous vraiment supprimer ?")) {
                // Code à éxécuter si le l'utilisateur clique sur "OK"
                exit();
            } else {
                // Code à éxécuter si l'utilisateur clique sur "Annuler" 
                e.preventDefault();
                exit();

            }
        });

    });
</script>