<?php

require "header_admin.php";
require "navbar_vertical.php";
require "../fonctions/upload.php";
require "../fonctions/upload_article_blog.php";
require "../fonctions/upload_cat.php";
require "../fonctions/fonctions_products.php";
require "../fonctions/fonctions_articles_blog.php";
require "../fonctions/fonctions_pages.php";



if (isset($_SESSION["role"]) != 5) {
    
    header('Location: login.php');

}


$select_count_category_page = select_count_categoryPage();
$select_count_blogCategory = select_count_blogCategory();
$select_count_shopCategory = select_count_shopCategory();
$select_count_page = select_count_page();
$select_count_blogArticles = select_count_blogArticles();
$select_count_shopProduct = select_count_shopProduct();
?>


<div class="main">

<!--=================================================================================================================
 * ************************************************ PARTIE PAGE **************************************************
 * CARD POUR LISTE DES CATEGORIES DE PAGES
 */ ==================================================================================================================-->

<div class="row  mr-0 mx-0">
    <div class="col-lg-3 offset-1 card_admin">
        <div><h4>Site web</h4></div>
    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Categorie de pages</div>
  <div class="card-body">
  <?php foreach($select_count_category_page as $row) {?>
    <?php if(isset($row['total'])); ?>
    <h5 class="card-title"><?php echo $row; ?></h5>
    <?php } ?>

  </div>
</div>
  </div>
<!--=================================================================================================================
 * ************************************************ PARTIE BLOG **************************************************
 * CARD POUR NOMBRES DE CATEGORIES ARTICLES
 */ ==================================================================================================================-->
<div class="col-lg-3 offset-1 card_admin">
<div><h4>Blog</h4></div>
<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Catégorie Article</div>
  <div class="card-body">
  <?php foreach($select_count_blogCategory as $row) {?>
    <?php if(isset($row['total'])); ?>
    <h5 class="card-title"><?php echo $row; ?></h5>
    <?php } ?>
  </div>
  </div>
</div>



<!--=================================================================================================================
 * ************************************************ PARTIE BOUTIQUE **************************************************
 * CARD POUR NOMBRE DE CATEGORIES DE PRODUITS
 */ ==================================================================================================================-->

 <div class="col-lg-3 offset-1 card_admin">
 <div><h4>Boutique</h4></div>
 <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Catégorie produit</div>
  <div class="card-body">
  <?php foreach($select_count_shopCategory as $row) {?>
    <?php if(isset($row['total'])); ?>
    <h5 class="card-title"><?php echo $row; ?></h5>
    <?php } ?>
  </div>
  </div>
</div>
</div>

<!--=================================================================================================================
 * ************************************************ PARTIE PAGE **************************************************
 * CARD POUR NOMBRE DE PAGES
 */ ==================================================================================================================-->

 <div class="row  mr-0 mx-0">
    <div class="col-lg-3 offset-1 card_admin">
        
    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Pages</div>
  <div class="card-body">
  <?php foreach($select_count_page as $row) {?>
    <?php if(isset($row['total'])); ?>
    <h5 class="card-title"><?php echo $row; ?></h5>
    <?php } ?>

  </div>
</div>
  </div>
<!--=================================================================================================================
 * ************************************************ PARTIE BLOG **************************************************
 * CARD POUR NOMBRES D'ARTICLES
 */ ==================================================================================================================-->
<div class="col-lg-3 offset-1 card_admin">

<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Articles</div>
  <div class="card-body">
  <?php foreach($select_count_blogArticles as $row) {?>
    <?php if(isset($row['total'])); ?>
    <h5 class="card-title"><?php echo $row; ?></h5>
    <?php } ?>
  </div>
  </div>
</div>



<!--=================================================================================================================
 * ************************************************ PARTIE BOUTIQUE **************************************************
 * CARD POUR NOMBRE DE CATEGORIES DE PRODUITS
 */ ==================================================================================================================-->

 <div class="col-lg-3 offset-1 card_admin">
 
 <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Produit</div>
  <div class="card-body">
  <?php foreach($select_count_shopProduct as $row) {?>
    <?php if(isset($row['total'])); ?>
    <h5 class="card-title"><?php echo $row; ?></h5>
    <?php } ?>
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



    <?php
    include "footer_admin.php";
    ?>

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