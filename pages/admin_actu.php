<?php
require "header_admin.php";
require "navbar_vertical.php";
require "../fonctions/fonctions_articles_blog.php";
require "../fonctions/upload_article_blog.php";
//require "config.php";


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


    @$id_article = htmlspecialchars($_POST["id_article"]);
    @$id_category_article = htmlspecialchars($_POST["category_article"]);
    @$id_user = htmlspecialchars($_POST["id_user"]);
    @$add_category_article =  htmlspecialchars($_POST["add_category_article"]);
    @$update_category_article =  htmlspecialchars($_POST["update_category_article"]);
    @$add_article = htmlspecialchars($_POST["add_article"]);
    @$update_article =  htmlspecialchars($_POST["update_article"]);
    @$disabled_article =  htmlspecialchars($_POST["delete_article"]);
    @$tags = htmlspecialchars($_POST["tags"]);
    @$active_article = htmlspecialchars($_POST["active_article"]);
    @$photos = htmlspecialchars($_POST["photos[]"]);
    @$category_article_name = htmlspecialchars($_POST["title_cat_article"]);
    @$commentaire  =  $_POST["commentaire"];
    @$title_article = htmlspecialchars($_POST["title_article"]);
    @$article = htmlspecialchars($_POST["description_article"]);
    @$short_article = htmlspecialchars($_POST["short_article"]);
    @$date_article = htmlspecialchars($_POST["date_article"]);
}

//  =================================================================================================================
//  * ********************************* APPEL DES FONCTIONS POUR LA PARTIE ACTUALITÉ *****************
//  */ ==============================================================================================================


//PERMET L'AJOUT DE CATEGORIES D'ARTICLES
if ($add_category_article) {
    add_category_blog(addslashes($category_article_name));
}



//PERMET la modification DE CATEGORIES D'ARTICLES
if ($update_category_article) {
    update_category_article($id_category_article, addslashes($category_article_name));
}

if ($update_category_article) {
    update_category($id_category_shop, $title_category_shop, $img_category_shop);
    img_load_cat($id_category_shop);
    //var_dump(img_load_cat($id_category));
}
//    var_dump();

//PERMET D'AFFICHER LA CATEGORIE DANS L'INPUT SI ELLE EST SELECTIONNÉE DANS LE SELECT
if (isset($_POST["category_article"])) {
    $select_cat_article = select_category_article($id_category_article);
}

// si on selectionne un article dans le select: permet l'appel de la fonction article_unique pour appeler un article 
//PERMET D'AFFICHER, DE RECUPÉRER L'ENSEMBLE DES INFOS SUR LES ARTICLES ET CATEGORIES
if (isset($id_article)) {
    $unique_article = article_unique($id_article);
    $Picture_article = unique_picture_article($id_article);
}



if ($disabled_article) {
    disabled_article($id_article);
}









//si on clic sur le bouton ajouter: permet l'appel de la fonction insert_article et insert_tags pour ajouter dans la base un nouvel article et un nouveau tag
if ($add_article) {
    $id_article = add_article(addslashes($title_article), addslashes($short_article), addslashes($article), $date_article, $id_category_article, $id_user, $commentaire);
    img_load_article($id_article);
    // insert_tags($id_article, $tags);
}


// si on clic sur le bouton modifier: permet l'appel de la fonction modif_article pour modifier un article et la fonction modif_tags pour modifier un tag
// Protege l'entrée
if ($update_article) {
    update_article($id_article, $id_category_article, addslashes($title_article), addslashes($article), addslashes($short_article), $date_article, addslashes($commentaire));
    img_load_article($id_article);
    $Picture_article = unique_picture_article($id_article);
    // modif_tags($id_article, $tags);
}



// PERMET L'AFFICHAGE DE LA LISTE  DES CATEGORIES DANS LE SELECT
$liste_category_blog = liste_cat_blog();

// permet de faire apparaite les titres des articles dans le select
$liste_titre =  liste_titre();
?>
<!-- <form class="form-admin" action="admin_actu" method="post" id="target" enctype="multipart/form-data">
<div class="row mr-0 mx-0">

<div class="form-group col-ml-4">

        <label class="formulaire" for="">Ajouter une categorie*</label><br>
        <input type="text" value=""
            name="title_cat_article" class="form-control" required>
        </div>
        <div class="col-ml-2">
        <input type="submit" class="btn btn-info" name="add_category_article" value="Ajouter">
</div>
                    <div class="form-group col-ml-4">
                        <label class="formulaire" for="">Modifier une categorie*</label><br>
                        <input type="text" value="<?php echo stripslashes(@$select_cat_article->category_article_name); ?>"
                            name="title_cat_article" class="form-control" >
                    </div>
                    <div class="col-ml-2">
                    <input type="submit" class="btn btn-warning" name="update_category_article" value="Modifier">
                                                                                </div>
                   
</div>
</form> -->
<!--=================================================================================================================
 * ************************************************ PARTIE ACTUALITÉ **************************************************
 * COLLAPSE POUR LES CATEGORIES D'ARTICLES
 */ ==================================================================================================================-->
<!-- <div class="row mr-0 mx-0 ligneTitreActu">
 <h1 class="titrePartie">Partie Actualité :</h1><br><br>
 </div> -->

<div class="main">
    <div class="row mr-0 mx-0">
        <div class="col-lg-4">

            <button class="button_collapse_categoryBlog" type="button" data-toggle="collapse" data-target="#collapseCategoryBlog" aria-expanded="true" aria-controls="multiCollapseExample1" name="collaspseCategoryBlog">
                <h3>Ajouter ou modifier une catégorie</h3>
            </button>





            <div class="collapse show collapse_categoryBlog" id="collapseCategoryBlog">
                <div class="card card-body card_col_categoryBlog">
                    <h3>ENTRER UNE CATEGORIE D'ARTICLE</h3>

                    <form class="form-admin" action="admin_actu" method="post" id="target" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- LISTE DES CATEGORIES -->
                            <label class="formulaire" for="">Choix de la catégorie*</label><br>
                            <select name="category_article" id="category_article" onChange="submit()" class="form-control">
                                <option value="">Choix catégorie</option>
                                <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                                <?php foreach ($liste_category_blog as $row) { ?>
                                    <option value="<?php echo $row->id_category_article; ?>" <?php if ($row->id_category_article == @$_POST["category_article"]) {
                                                                                                    echo " selected";
                                                                                                } ?>>
                                        <?php echo stripslashes($row->category_article_name); ?>
                                    </option>
                                <?php } ?>

                            </select>

                        </div>
                        <br>
                        <div class="form-group">
                            <label class="formulaire" for="">Ajouter une categorie*</label><br>
                            <input type="text" value="<?php echo stripslashes(@$select_cat_article->category_article_name); ?>" name="title_cat_article" class="form-control" required>
                        </div>

                        <br>
                        <br>

                        <?php if (@$id_category_article) { ?>


                            <input type="submit" class="btn btn-warning" name="update_category_article" value="Modifier">

                        <?php } else { ?>
                            <input type="submit" class="btn btn-info" name="add_category_article" value="Ajouter">
                        <?php } ?>
                    </form>
                </div>
            </div>

        </div>


        <!--=====================================================================
 * COLLAPSE POUR LES ARTICLES
 */ =================================================================-->
        <div class="col-lg-7 offset-1">

            <button class="button_collapse_article" type="button" data-toggle="collapse" data-target="#collapseArticle" aria-expanded="true" aria-controls="multiCollapseExample1" name="collaspseArticle">
                <h3>Ajouter ou modifier un article</h3>
            </button>

            <div class="collapse show collapse_article" id="collapseArticle">
                <div class="card card-body card_col_article">
                    <h3>ENTRER UN ARTICLE</h3>
                    <br>
                    <!-- Formulaire permettant de selectionner les titre, les catégories et de creer de nouveaux articles -->
                    <form class="form-admin" action="admin_actu" method="post" id="target" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- LISTE DES TITRES -->
                            <label class="formulaire" for="">Choix du titre*</label><br>
                            <select name="id_article" id="id_article" onChange="submit()" class="form-control">
                                <option value="">Choix du titre</option>
                                <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                                <?php foreach ($liste_titre as $row) { ?>
                                    <option value="<?php echo $row->id_article; ?>" <?php if ($row->id_article == @$_POST["id_article"]) {
                                                                                        echo " selected";
                                                                                    } ?>>
                                        <?php echo stripslashes($row->title_article); ?>
                                    </option>
                                <?php } ?>

                            </select>

                        </div>
                        <div class="form-group">
                            <!-- LISTE CATEGORIES -->
                            <label class="formulaire" for="">Choix des categories*</label><br>
                            <select name="category_article" id="id_category_article" class="form-control" required>
                                <option value="">Choix de votre catégorie</option>
                                <?php foreach ($liste_category_blog as $row) { ?>

                                    <option value="<?php echo $row->id_category_article; ?>" <?php if ($row->id_category_article == @$unique_article->id_category_article) {
                                                                                                    echo " selected";
                                                                                                } ?>><?php echo $row->category_article_name; ?>
                                    </option>

                                <?php } ?>
                            </select>

                        </div>
                        <br>



                        <br>
                        <!--Titre article: le echo permet de recupérer la valeur qui est dans le base de donnée -->
                        <div class="form-group">
                            <label class="formulaire" for="">Titre de l'article*</label><br>
                            <input type="text" value="<?php echo stripslashes(@$unique_article->title_article); ?>" name="title_article" class="form-control" required>
                        </div>

                        <!-- Article court le echo permet de recupérer la valeur qui est dans le base de donnée
            Affichage du résumé de l'article-->
                        <label class="formulaire" for="">Résumé de l'article</label><br>
                        <textarea class="form-control" name="short_article" maxlength="300" id="editor" cols="30" rows="5"><?php echo @$unique_article->short_article; ?></textarea>
                        <br><br>


                        <!-- Article le echo permet de recupérer la valeur qui est dans le base de donnée-->
                        <div class="form-group">
                            <label class="formulaire" for="">Description complète de l'article*</label><br>
                            <textarea name="description_article" id="editor" class="form-control" cols="30" rows="10"><?php echo stripslashes(@$unique_article->article); ?></textarea><br>


                            <?php // echo @$article_unique->commentaire; 
                            ?>
                        </div>

                        <br><br>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="date" name="date_article" value="<?php echo stripslashes(@$unique_article->create_article); ?>">
                        </div>
                        <!--Permet d'afficher id_user qui est connecté (cacher avec le type hidden)-->
                        <input type="hidden" name="id_user" class="form-control" value="<?php echo @$_SESSION["id_user"]; ?>" required><br>

                        <?php
                        // si commentaire egale a rien ou si commentaire egale à 1 le oui est cocher sinon c'est la valeur non. 
                        if (@$article_unique->commentaire == "" || @$article_unique->commentaire == 1) {
                            $checked1 = " checked ";
                        } else {
                            $checked2 = " checked ";
                        }

                        ?>

                        <!--le resultat du if au dessus est afficher par un echo dans les input oui et non-->
                        <label class="formulaire" for="">Commentaire*</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?php echo @$checked1 ?> name="commentaire" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Oui</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?php echo @$checked2 ?> name="commentaire" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Non</label>
                        </div>
                        <br>
                        <br>

                        <!-- TAGS: le echo permet d'afficher les tags a la selection du titre de l'article-->
                        <label for="">Tags séparer par une virgule</label><br>
                        <input type="text" value="<?php echo @$article_unique->noms_tag; ?>" class="form-control" name="tags">

                        <!--Permet de coché si on veut activer ou désactiver le produit -->

                        <!-- <?php if (@$unique_article->active_article == 1) {
                                    $checked2 = " checked ";
                                } else {
                                    $checked2 = "";
                                } ?>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" id="customCheck1" name="active_article" <?php echo @$checked2 ?>>
                            <label class="custom-control-label" for="customCheck1">Rendre l'article visible sur le site</label>
                        </div> -->
                        <br>
                        <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
                        <input type="file" name="photos[]" multiple><br><br>
                        <div>
                            <?php if (@$id_article) { ?>
                                <!--Via le foreach on accède à $image_unique sous forme de "tableau" qu'on segmente ensuite en ligne (row)-->
                                <?php foreach (@$Picture_article as $row) { ?>

                                    <!--Et dans le row on va chercher le champ name_image_product pour l'afficher dans une balise image via un echo-->
                                    <img width="100" src="../uploads/<?php echo @$row->title_picture_article ?>" alt="">
                                <?php } ?>
                            <?php } ?>

                        </div>

                        <!-- si id_article est vrai on affiche les boutons modifier et supprimer sinon on affiche le bouton ajouter-->
                        <?php if (@$id_article) { ?>


                            <input type="submit" class="btn btn-warning" name="update_article" value="Modifier">


                            <input type="submit" id="supprimer_article" class="btn btn-danger" name="delete_article" value="Supprimer">
                        <?php } else { ?>
                            <input type="submit" class="btn btn-info" name="add_article" value="Ajouter">
                        <?php } ?>





                    </form>
                </div>
            </div>
        </div>

    </div>

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
                    header(location)
                    e.preventDefault();
                    exit();

                }
            });

        });
    </script>