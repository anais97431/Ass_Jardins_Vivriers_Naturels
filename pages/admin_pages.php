<?php 
 //header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
require "header_admin.php";
require "navbar_vertical.php";
require "../fonctions/fonctions_articles_blog.php";
require "../fonctions/upload_page.php";
require "../fonctions/fonctions_pages.php";


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

    $presentation_page_post = array();
    @$id_page = htmlspecialchars($_POST["id_page1"]);
    @$id_page2 = htmlspecialchars($_POST["id_page2"]);
    @$id_category_page = htmlspecialchars($_POST["category_page"]);
    @$id_category_page0 = htmlspecialchars($_POST["category_page0"]);
    @$id_category_page1 = htmlspecialchars($_POST["category_page1"]);
    @$id_category_page2 = htmlspecialchars($_POST["category_page2"]);
    @$id_user = htmlspecialchars($_POST["id_user"]);
    @$add_category_page =  htmlspecialchars($_POST["add_category_page"]);
    @$update_category_page =  htmlspecialchars($_POST["update_category_page"]);
    @$add_page = htmlspecialchars($_POST["add_page"]);
    @$update_page =  htmlspecialchars($_POST["update_page"]);
    @$update_page2 =  htmlspecialchars($_POST["update_page2"]);
    @$disabled_page =  htmlspecialchars($_POST["delete_page"]);
    @$disabled_page2 =  htmlspecialchars($_POST["delete_page2"]);
    @$photos = htmlspecialchars($_POST["photos[]"]);
    @$title_category_page1 = htmlspecialchars($_POST["title_cat_page1"]);
    @$title_category_page2 = htmlspecialchars($_POST["title_cat_page2"]);
    @$name_category_page1 = htmlspecialchars($_POST["name_cat_page1"]);
    @$name_category_page2 = htmlspecialchars($_POST["name_cat_page2"]);
    @$commentaire  =  $_POST["commentaire"];
    @$title_page = htmlspecialchars($_POST["title_page"]);
    @$title_page1 = htmlspecialchars($_POST["title_page1"]);
    @$title_page2 = htmlspecialchars($_POST["title_page2"]);
    @$url_page = htmlspecialchars($_POST["url_page"]);
    @$url_page1 = htmlspecialchars($_POST["url_page1"]);
    @$url_page2 = htmlspecialchars($_POST["url_page2"]);
    @$number_content = $_POST["number_content"];
    @$number_content1 = $_POST["number_content1"];
    @$number_content2 = $_POST["number_content2"];
    @$order_content = $_POST["ordre"];
    @$id_presentation = $_POST["id_content"];
    @$presentation_page_post = $_POST["presentation_page"];
    @$title_presentation = $_POST["title_presentation"];
    @$date_start = $_POST["date_start"];
    @$date_end = $_POST["date_end"];
//var_dump($_POST);

    // var_dump($_POST);
}

//  =================================================================================================================
//  * ********************************* APPEL DES FONCTIONS POUR LA PARTIE PAGE *****************
//  */ ==============================================================================================================


// if($id_page != ''){
//     var_dump($id_page);
// }

// die();


//PERMET L'AJOUT DE CATEGORIES DE PAGE
if ($add_category_page) {
    add_category_pages($title_category_page1,$name_category_page1);
   
}


//PERMET LA MODIFICATION DE CATEGORIES DE PAGE
    if ($update_category_page) {
        update_category_page($id_category_page, $title_category_page2, $name_category_page2);
        //var_dump(img_load_cat($id_category));
    }
//PERMET D'AFFICHER LA CATEGORIE DANS L'INPUT SI ELLE EST SELECTIONNÉE DANS LE SELECT
 if (isset($_POST["category_page"])) {
    
 $select_cat_page = select_category_page($id_category_page);
 }

 
// si on clic sur le bouton modifier: permet l'appel de la fonction update_page pour modifier une page et la fonction insert_content pour ajouter des descriptions
// Protege l'entrée
if ($update_page) {
  
   
    update_page($id_category_page1, addslashes($url_page1), addslashes($title_page1), addslashes($number_content1), $id_page);
    img_load_page($id_page);
    //$Picture_article = unique_picture_article($id_article);
    
}

// si on clic sur le bouton modifier: permet l'appel de la fonction update_page pour modifier une page et la fonction insert_content pour ajouter des descriptions
// Protege l'entrée
if ($update_page2) {
  insert_description($title_presentation, $presentation_page_post, $date_start, $date_end, $order_content, $id_page2, $id_presentation);
  update_page($id_category_page2, addslashes($url_page2), addslashes($title_page2), addslashes($number_content2), $id_page2);
  img_load_page($id_presentation);
  //$Picture_article = unique_picture_article($id_article);
  
}


// si on selectionne une page dans le select: permet l'appel de la fonction single_page pour appeler une page 
//PERMET D'AFFICHER, DE RECUPÉRER L'ENSEMBLE DES INFOS SUR LA PAGE
if(isset($id_page)){
 
// var_dump($presentation_page);

$single_page = single_page($id_page);
// $presentation_page = presentation_page($id_page);
//var_dump($single_page);
// $Picture_article = unique_picture_article($id_article);

}


// si on selectionne une page dans le select: permet l'appel de la fonction single_page pour appeler une page 
//PERMET D'AFFICHER, DE RECUPÉRER L'ENSEMBLE DES INFOS SUR LA PAGE
if(isset($id_page2)){
  $presentation_page =  presentation_page($id_page2);
 
 // var_dump($presentation_page);
 

 
 $single_page2 = single_page($id_page2);
 // $presentation_page = presentation_page($id_page);
 //var_dump($single_page);
 // $Picture_article = unique_picture_article($id_article);
 
 }
 

// si on clic sur le bouton supprimer: permet l'appel de la fonction supprime_article pour supprimer un article 

// if ($disabled_article) {
//     disabled_article($id_article);
// }
//si on clic sur le bouton ajouter: permet l'appel de la fonction insert_page pour ajouter dans la base une nouvelle page
if ($add_page) {
    $id_page = insert_page(addslashes($title_page), addslashes($url_page), addslashes($number_content), $id_category_page);
    //img_load_article($id_article);
    // insert_tags($id_article, $tags);
}



// si on clic sur la checkbox: permet l'appel de la fonction active_article pour activer l'article
// //if ($active_article) {
//     active_article($id_article);
// //}


// PERMET L'AFFICHAGE DE LA LISTE  DES CATEGORIES DANS LE SELECT
$liste_category_pages = liste_title_cat_pages();


// permet de faire apparaite les titres des pages dans le select
$liste_titre_page =  liste_pages();


?>
<div class="main">
<!--=================================================================================================================
 * ************************************************TABS**************************************************
 * BOUTON POUR ACTIONNER LES TABS AVEC LES CONTENUS CORRESPONDANT
 */ ==================================================================================================================-->

<h2>Vertical Tabs</h2>
<p>Click on the buttons inside the tabbed menu:</p>

<div class="tab">
  <button class="tablinks" onclick="updateContent(event, 'addCategoryPage')" id="defaultOpen">Ajouter une catégorie </button>
  <button class="tablinks" onclick="updateContent(event, 'updateCategoryPage')">Modifier une catégorie</button>
  <button class="tablinks" onclick="updateContent(event, 'addPage')">Ajouter une page</button>
  <button class="tablinks" onclick="updateContent(event, 'updatePage')">Modifier une page</button>
  <button class="tablinks" onclick="updateContent(event, 'addUpdateContent')">Ajouter ou modifier des contenus</button>
</div>

<!--=================================================================================================================
 * ************************************************ TABS **************************************************
 * AJOUTER UNE CATEGORIE DE PAGE
 */ ==================================================================================================================-->
<div id="addCategoryPage" class="tabcontent">
  <h4>Ajouter une catégorie de page qui se trouvera dans la barre de navigation principale :</h4>
  <form class="form-tableau" action="admin_pages" method="post">
  <label class="formulaire" for="titreCategory1">Ajouter une categorie*</label><br>
                        <input type="text" value=""
                            name="title_cat_page1" class="form-control" id="titreCategory1" required>


<label class="formulaire" for="titreCategory">URL de la page catégorie*</label><br>
                        <input type="text" value=""
                            name="name_cat_page1" class="form-control" id="titreCategory" required><br>
    
                        
<button class="btn btn-info add_category_page"  type="submit" name="add_category_page" value="add"><i class="fas fa-plus-circle"></i> Ajouter</button>
 
</form>
</div>


<!--=================================================================================================================
 * ************************************************ TABS **************************************************
 * MODIFIER UNE CATEGORIE DE PAGE
 */ ==================================================================================================================-->
<div id="updateCategoryPage" class="tabcontent">
  <h5>Modifier une catégorie de page qui se trouve dans la barre de navigation principale :</h5>
  <form class="form-tableau" action="admin_pages" method="post">
  <label for="category_page">Choix de la catégorie*</label><br>
  <select name="category_page" id="category_page" onChange="submit()" class="form-control">
    <option value="">Choix catégorie</option>
      <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
        <?php foreach ($liste_category_pages as $row) { ?>
            <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$_POST["category_page"]) {
                    echo " selected"; } ?>>
                    <?php echo stripslashes($row->title_category_page); ?></option><?php } ?>
                        </select><br>
                        <label class="formulaire" for="titreCategory2">Modifier le nom de la catégorie*</label><br>
                  <input type="text" value="<?php echo stripslashes(@$select_cat_page ->title_category_page); ?>"
                            name="title_cat_page2" class="form-control" id="titreCategory2" required><br>
                            <label class="formulaire" for="titreCategory3">Modifier l'URL de la catégorie*</label><br>
                  <input type="text" value="<?php echo stripslashes(@$select_cat_page ->name_category_page); ?>"
                            name="name_cat_page2" class="form-control" id="titreCategory3" required><br>
                        
                        <button class="btn btn-warning"  type="submit" name="update_category_page" value="update"><i class="fas fa-pencil-alt"></i> Modifier</button>
                        <button class="btn btn-danger" type="submit" name="delete_category_page" value="delete"><i class="fas fa-trash-alt"></i> Supprimer</button>
                        
</form>
</div>


<!--=================================================================================================================
 * ************************************************ TABS **************************************************
 * AJOUTER UNE PAGE AVEC UN NOMBRE DE DESCRIPTION
 */ ==================================================================================================================-->
<div id="addPage" class="tabcontent">
  <h3>Ajouter une page qui se trouvera dans les des menus principaux :</h3>
  <!--Titre page: le echo permet de recupérer la valeur qui est dans le base de donnée -->
  <form class="form-tableau" action="admin_pages" method="post">
  <div class="form-group">
            <!-- LISTE CATEGORIES -->
            <label class="formulaire" for="">Choix des categories*</label><br>
            <select name="category_page0" id="category_page0" class="form-control" required>
                <option value="">Choix de votre catégorie</option>
                <?php foreach ($liste_category_pages as $row) { ?>

                <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$single_page->id_category_page) {
                                                                            echo " selected";
                                                                        } ?>><?php echo $row->title_category_page; ?>
                </option>

                <?php } ?>
            </select>

        </div>
        <br>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitrePage">Titre de la page*</label>
      <input type="text" value="" name="title_page" class="form-control"  id="inputTitrePage" required>
    </div>
    <!-- URL Page le echo permet de recupérer la valeur qui est dans le base de donnée-->
    <div class="form-group col-md-6">
      <label for="">URL de la page*</label>
      <input type="text" name="url_page" class="form-control" cols="30"
                    rows="10" value="">
    </div>
  </div>
        
        <br><br>
        
    
      <label for="">Nombre de description*</label>
      <input type="text" name="number_content" class="form-control" cols="30"
                    rows="10" value=""><br>

        <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
        <input type="file" name="photos[]" multiple><br><br>
        <div>
            <?php if (@$id_page) { ?>
            <!--Via le foreach on accède à $image_unique sous forme de "tableau" qu'on segmente ensuite en ligne (row)-->
            <?php //foreach (@$Picture_article as $row) { ?>
                
            <!--Et dans le row on va chercher le champ name_image_product pour l'afficher dans une balise image via un echo-->
            <img width="100" src="../uploads/<?php echo @$row->title_picture_article ?>" alt="">
            <?php } ?>
            <?php //} ?>

        </div> 
        
        <button type="submit" class="btn btn-info" name="add_page" value="Ajouter"> <i class="fas fa-plus-circle"></i> Ajouter</button>  
            </form>

</div>


<!--=================================================================================================================
 * ************************************************ TABS **************************************************
 * MODIFIER UNE PAGE ET LE NOMBRE DE DESCRIPTION
 */ ==================================================================================================================-->
<div id="updatePage" class="tabcontent">
  <h4>Modifier une page qui se trouve dans la barre de navigation principale :</h4>
  <form class="form-tableau" action="admin_pages" method="post">
  <div class="form-row">
           
  <div class="form-group col-md-6">
            <!-- LISTE DES TITRES -->
           
            <label class="formulaire" for="">Choix du titre*</label><br>
            <select name="id_page1" id="id_page1" onChange="submit()" class="form-control">
                <option value="">Choix du titre</option>
                <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                <?php foreach ($liste_titre_page as $row) { ?>
                <option value="<?php echo $row->id_page; ?>" <?php if ($row->id_page == @$_POST["id_page1"]) {
                                                                        echo " selected";
                                                                    } ?>>
                    <?php echo stripslashes($row->title_page); ?>
                </option>
                <?php } ?>

            </select>

        </div>
        <div class="form-group col-md-6">
            <!-- LISTE CATEGORIES -->
            <label class="formulaire" for="">Choix des categories*</label><br>
            <select name="category_page1" id="category_page1" class="form-control" required>
                <option value="">Choix de votre catégorie</option>
                <?php foreach ($liste_category_pages as $row) { ?>

                <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$single_page->id_category_page) {
                                                                            echo " selected";
                                                                        } ?>><?php echo $row->title_category_page; ?>
                </option>

                <?php } ?>
            </select>

        </div>
     </div>
        <br>

       
<!--Titre page: le echo permet de recupérer la valeur qui est dans le base de donnée -->
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitrePage">Titre de la page*</label>
      <input type="text" value="<?php echo stripslashes(@$single_page->title_page); ?>" name="title_page1" class="form-control"  id="inputTitrePage" required>
    </div>
    <!-- URL Page le echo permet de recupérer la valeur qui est dans le base de donnée-->
    <div class="form-group col-md-6">
      <label for="">URL de la page*</label>
      <input type="text" name="url_page1" class="form-control" cols="30"
                    rows="10" value="<?php echo stripslashes(@$single_page->url_page); ?>">
    </div>
  </div>
        
        <br><br>
        
    
      <label for="">Nombre de description*</label>
      <input type="text" name="number_content1" class="form-control" cols="30"
                    rows="10" value="<?php echo stripslashes(@$single_page->number_content); ?>"><br>

 
    <!--Permet d'afficher id_user qui est connecté (cacher avec le type hidden)-->
    <input type="hidden" name="id_user" class="form-control" value="<?php echo @$_SESSION["id_user"]; ?>"
        required><br>

      
    <!--Permet de coché si on veut activer ou désactiver le produit -->

    <?php if (@$single_page->active_page == 1) {
        $checked2 = " checked ";
    } else {
        $checked2 = "";
    } ?>

    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" value="1" id="customCheck1" name="active_page"
            <?php echo @$checked2 ?>>
        <label class="custom-control-label" for="customCheck1">Rendre la page visible sur le site</label>
    </div>
    <br>
    <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
    <input type="file" name="photos[]" multiple><br><br>
    <div>
        <?php if (@$id_page) { ?>
        <!--Via le foreach on accède à $image_unique sous forme de "tableau" qu'on segmente ensuite en ligne (row)-->
        <?php //foreach (@$Picture_article as $row) { ?>
            
        <!--Et dans le row on va chercher le champ name_image_product pour l'afficher dans une balise image via un echo-->
        <img width="100" src="../uploads/<?php echo @$row->title_picture_page ?>" alt="">
        <?php } ?>
        <?php //} ?>

    </div>

        <button class="btn btn-warning"  type="submit" name="update_page" value="update"><i class="fas fa-pencil-alt"></i> Modifier</button>
        <button class="btn btn-danger" type="submit" name="delete_page" value="delete"><i class="fas fa-trash-alt"></i> Supprimer</button>
</form>
</div>


<!--=================================================================================================================
 * ************************************************ TABS **************************************************
 * MODIFIER LES PRESENTATIONS D'UNE PAGE
 */ ==================================================================================================================-->

<div id="addUpdateContent" class="tabcontent">
  <h4>Modifier une page qui se trouve dans la barre de navigation principale :</h4>
  <form class="form-tableau" action="admin_pages" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
            <!-- LISTE DES TITRES -->
            <label class="formulaire" for="">Choix du titre*</label><br>
            <select name="id_page2" id="id_page2" onChange="submit()" class="form-control">
                <option value="">Choix du titre</option>
                <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                <?php foreach ($liste_titre_page as $row) { ?>
                <option value="<?php echo $row->id_page; ?>" <?php if ($row->id_page == @$_POST["id_page2"]) {
                                                                        echo " selected";
                                                                    } ?>>
                    <?php echo stripslashes($row->title_page); ?>
                </option>
                <?php } ?>

            </select>

        </div>
        <div class="form-group col-md-6">
            <!-- LISTE CATEGORIES -->
            <label class="formulaire" for="">Choix des categories*</label><br>
            <select name="category_page2" id="category_page2" class="form-control" required>
                <option value="">Choix de votre catégorie</option>
                <?php foreach ($liste_category_pages as $row) { ?>

                <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$single_page2->id_category_page) {
                                                                            echo " selected";
                                                                        } ?>><?php echo $row->title_category_page; ?>
                </option>

                <?php } ?>
            </select>

        </div>
     </div>
        <br>

       
<!--Titre page: le echo permet de recupérer la valeur qui est dans le base de donnée -->
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitrePage">Titre de la page*</label>
      <input type="text" value="<?php echo stripslashes(@$single_page2->title_page); ?>" name="title_page2" class="form-control"  id="inputTitrePage2" required>
    </div>
    <!-- URL Page le echo permet de recupérer la valeur qui est dans le base de donnée-->
    <div class="form-group col-md-6">
      <label for="">URL de la page*</label>
      <input type="text" name="url_page2" class="form-control" cols="30"
                    rows="10" value="<?php echo stripslashes(@$single_page2->url_page); ?>">
    </div>
  </div>
        
        <br><br>
        
    
      <label for="">Nombre de description*</label>
      <input type="text" name="number_content2" class="form-control" cols="30"
                    rows="10" value="<?php echo stripslashes(@$single_page2->number_content); ?>"><br>

 <!--Permet l'affichage des blocs de texte en fonction du nombre de description qui sont dans la page-->

 <?php if(isset($presentation_page[0]->id_presentation)) {?>

<?php boucle_foreach($presentation_page)?>

<?php }else{?>
<?php if($id_page2!= ''){ ?>
<?php boucle_for($single_page2->number_content);?>


<?php }} ?>      

    <!--Permet d'afficher id_user qui est connecté (cacher avec le type hidden)-->
    <input type="hidden" name="id_user" class="form-control" value="<?php echo @$_SESSION["id_user"]; ?>"
        required><br>

      
    <!--Permet de coché si on veut activer ou désactiver le produit -->

    <?php if (@$unique_article->active_article == 1) {
        $checked2 = " checked ";
    } else {
        $checked2 = "";
    } ?>

    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" value="1" id="customCheck1" name="active_article"
            <?php echo @$checked2 ?>>
        <label class="custom-control-label" for="customCheck1">Rendre les présentations visiblent sur le site</label>
    </div>
    <br>
    <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
    <input type="file" name="photos[]" multiple><br><br>
    <div>
        <?php if (@$id_page2) { ?>
        <!--Via le foreach on accède à $image_unique sous forme de "tableau" qu'on segmente ensuite en ligne (row)-->
        <?php //foreach (@$Picture_article as $row) { ?>
            
        <!--Et dans le row on va chercher le champ name_image_product pour l'afficher dans une balise image via un echo-->
        <img width="100" src="../uploads/<?php echo @$row->title_picture_article ?>" alt="">
        <?php } ?>
        <?php //} ?>

    </div>

        <button class="btn btn-warning"  type="submit" name="update_page2" value="update"><i class="fas fa-pencil-alt"></i> Modifier</button>
        <button class="btn btn-danger" type="submit" name="delete_page2" value="delete"><i class="fas fa-trash-alt"></i> Supprimer</button>
</form>
</div>








<!--=================================================================================================================
 * ************************************************ PARTIE PAGES **************************************************
 * COLLAPSE POUR LES CATEGORIES DE PAGES
 */ ==================================================================================================================-->
<!-- <div class="row mr-0 mx-0 ligneTitreActu">
 <h1 class="titrePartie">Partie Actualité :</h1><br><br>
 </div> -->

 <!-- <form class="form-admin" action="admin_pages" method="post" id="target" enctype="multipart/form-data">
<div class= container>
<label class="formulaire" for="">Choix des categories*</label><br>
            <select name="category_page" id="category_page" class="form-control" required>
                <option value="">Choix de votre catégorie</option>
                <?php foreach ($liste_category_pages as $row) { ?>

                <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$single_page->id_category_page) {
                                                                            echo " selected";
                                                                        } ?>><?php echo $row->title_category_page; ?>
                </option>

                <?php } ?>
            </select>


            
 <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitrePage">Titre de la page*</label>
      <input type="text" value="<?php echo stripslashes(@$single_page->title_page); ?>" name="title_page" class="form-control"  id="inputTitrePage" required>
    </div>
    -- URL Page le echo permet de recupérer la valeur qui est dans le base de donnée--
    <div class="form-group col-md-6">
      <label for="">URL de la page*</label>
      <input type="text" name="url_page" class="form-control" cols="30"
                    rows="10" value="<?php echo stripslashes(@$single_page->url_page); ?>">
    </div>
  </div>
  <input type="submit" class="btn btn-info" name="add_page" value="Ajouter">
  </div>      
  </form> -->
  
 <div class="row mr-0 mx-0">
   <div class="col-lg-4">

 <button class="button_collapse_categoryPage" type="button" data-toggle="collapse" data-target="#collapseCategoryPage"
                aria-expanded="true" aria-controls="multiCollapseExample1" name="collaspseCategoryPage">
                <h3>Ajouter ou modifier une catégorie</h3>
            </button>
      


   
        <div class="collapse show collapse_categoryPage" id="collapseCategoryPage">
            <div class="card card-body card_col_categoryPage">
                <h3>ENTRER UNE CATEGORIE</h3>

                <form class="form-admin" action="admin_pages" method="post" id="target" enctype="multipart/form-data">

            <label for="category_page">Choix de la catégorie*</label>
                <select name="category_page" id="category_page" onChange="submit()" class="form-control">
                            <option value="">Choix catégorie</option>
                            <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                            <?php foreach ($liste_category_pages as $row) { ?>
                            <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$_POST["category_page"]) {
                                                                                        echo " selected";
                                                                                    } ?>>
                                <?php echo stripslashes($row->title_category_page); ?>
                            </option>
                            <?php } ?>

                        </select><br>


 
      <label class="formulaire" for="titreCategory">Ajouter une categorie*</label><br>
                        <input type="text" value="<?php echo stripslashes(@$select_cat_page->title_category_page); ?>"
                            name="title_cat_page" class="form-control" id="titreCategory" required>


<label class="formulaire" for="titreCategory">URL de la page catégorie*</label><br>
                        <input type="text" value="<?php echo stripslashes(@$select_cat_page->name_category_page); ?>"
                            name="name_cat_page" class="form-control" id="titreCategory" required>
    

    

                    <br>
                   <br>

                    <?php if (@$id_category_page) { ?>


                    <input type="submit" class="btn btn-warning" name="update_category_page" value="Modifier">

                    <?php } else { ?>
                    <input type="submit" class="btn btn-info" name="add_category_page" value="Ajouter">
                    <?php } ?>
                </form>
                </div>
            </div>
        </div>



<!--=====================================================================
 * COLLAPSE POUR LES PAGES
 */ =================================================================-->
 <div class="col-lg-7 offset-1">

<button class="button_collapse_page" type="button" data-toggle="collapse" data-target="#collapsePage"
            aria-expanded="true" aria-controls="multiCollapseExample1" name="collaspsePage">
            <h3>Ajouter ou modifier une page</h3>
        </button>

        <div class="collapse show collapse_page" id="collapsePage">
        <div class="card card-body card_col_page">
        <h3>ENTRER UNE PAGE</h3>
    <br>
    <!-- Formulaire permettant de selectionner les titre, les catégories et de creer une nouvelle page -->
    <form class="form-admin" action="admin_pages" method="post" id="target" enctype="multipart/form-data">
        <div class="form-group">
            <!-- LISTE DES TITRES -->
            <label class="formulaire" for="">Choix du titre*</label><br>
            <select name="id_page" id="id_page" onChange="submit()" class="form-control">
                <option value="">Choix du titre</option>
                -- Boucle permettant de recupérer dans le select le titre de l'article -
                <?php foreach ($liste_titre_page as $row) { ?>
                <option value="<?php echo $row->id_page; ?>" <?php if ($row->id_page == @$_POST["id_page"]) {
                                                                        echo " selected";
                                                                    } ?>>
                    <?php echo stripslashes($row->title_page); ?>
                </option>
                <?php } ?>

            </select>

        </div>
        <div class="form-group">
            <!-- LISTE CATEGORIES -->
            <label class="formulaire" for="">Choix des categories*</label><br>
            <select name="category_page" id="category_page" class="form-control" required>
                <option value="">Choix de votre catégorie</option>
                <?php foreach ($liste_category_pages as $row) { ?>

                <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$single_page->id_category_page) {
                                                                            echo " selected";
                                                                        } ?>><?php echo $row->title_category_page; ?>
                </option>

                <?php } ?>
            </select>

        </div>
        <br>

       
<!--Titre page: le echo permet de recupérer la valeur qui est dans le base de donnée -->
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitrePage">Titre de la page*</label>
      <input type="text" value="<?php echo stripslashes(@$single_page->title_page); ?>" name="title_page" class="form-control"  id="inputTitrePage" required>
    </div>
    <!-- URL Page le echo permet de recupérer la valeur qui est dans le base de donnée-->
    <div class="form-group col-md-6">
      <label for="">URL de la page*</label>
      <input type="text" name="url_page" class="form-control" cols="30"
                    rows="10" value="<?php echo stripslashes(@$single_page->url_page); ?>">
    </div>
  </div>
        
        <br><br>
        
    
      <label for="">Nombre de description*</label>
      <input type="text" name="number_content" class="form-control" cols="30"
                    rows="10" value="<?php echo stripslashes(@$single_page->number_content); ?>"><br>
  
        <!--Permet l'affichage des blocs de texte en fonction du nombre de description qui sont dans la page-->

<?php if(isset($presentation_page[0]->id_presentation)) {?>

    <?php boucle_foreach($presentation_page)?>
  
<?php }else{?>
  <?php if($id_page!= ''){ ?>
  <?php boucle_for($single_page->number_content);?>


<?php }} ?>      

        <!--Permet d'afficher id_user qui est connecté (cacher avec le type hidden)-->
        <input type="hidden" name="id_user" class="form-control" value="<?php echo @$_SESSION["id_user"]; ?>"
            required><br>

          
        <!--Permet de coché si on veut activer ou désactiver le produit -->

        <?php if (@$unique_article->active_article == 1) {
            $checked2 = " checked ";
        } else {
            $checked2 = "";
        } ?>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" value="1" id="customCheck1" name="active_article"
                <?php echo @$checked2 ?>>
            <label class="custom-control-label" for="customCheck1">Rendre l'article visible sur le site</label>
        </div>
        <br>
        <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
        <input type="file" name="photos[]" multiple><br><br>
        <div>
            <?php if (@$id_page) { ?>
            <!--Via le foreach on accède à $image_unique sous forme de "tableau" qu'on segmente ensuite en ligne (row)-->
            <?php //foreach (@$Picture_article as $row) { ?>
                
            <!--Et dans le row on va chercher le champ name_image_product pour l'afficher dans une balise image via un echo-->
            <img width="100" src="../uploads/<?php echo @$row->title_picture_article ?>" alt="">
            <?php } ?>
            <?php //} ?>

        </div>
        <!-- si id_article est vrai on affiche les boutons modifier et supprimer sinon on affiche le bouton ajouter-->
        <?php if (@$id_page) { ?>


        <input type="submit" class="btn btn-warning" name="update_page" value="Modifier">


        <input type="submit" id="supprimer_article" class="btn btn-danger" name="delete_page" value="Supprimer">
        <?php } else { ?>
        
        <input type="submit" class="btn btn-info" name="add_page" value="Ajouter">
        <?php } ?>





    </form>
    </div>
 </div>             
</div>
</div>




<form action="" method="post">
<input type="text" name="ordre[]" value="" >
            <input type="hidden" value="1" name="id_image[]"> 
            <input type="text" name="ordre[]" value="">
            <input type="hidden" value="2" name="id_image[]">
            <input type="text" name="ordre[]" value="">
            <input type="hidden" value="3"name="id_image[]">
            <input type="submit" value="bouton">
</form>


<!-- AJOUTER DES CATEGORIES ET DES PAGES -->


<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Ajouter une categorie</button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2 multiCollapseExample2">Ajouter une page</button>
</p>
<div class="row">
   <div class="col-6"> 
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <!-- Début tableau ajout categorie -->

        <div class="container cont_table_admin_page">
        <table class="table_admin_page">
            <thead class="entete_tableau_adminPage">
                <tr>
                    <th>Nom de la Catégorie</th>
                    <th>URL de la Catégorie</th>
                    <th>Ajouter</th>
                    
                </tr>
            </thead>


            <tbody class="corps_tableau_adminPage">
           
                <form class="form-tableau" action="admin_pages" method="post">
                    <tr>
                  
                        <td><input type="text" value=""
                            name="title_cat_page" class="form-control" id="titreCategory" required></td>
                        <td><input type="text" value=""
                            name="name_cat_page" class="form-control" id="titreCategory" required></td>
                        <td><?php echo $row->date_category_page ?></td>
                        
                        <td><button class="add_category_page"  type="submit" name="add_category_page" value="add"> <i class="fas fa-plus-circle"></i> </button></td>
                  
                    </tr>
                    
                </form>
            </tbody>
        </table>
        </div>

      </div>
    </div>
   </div>
        </div>

        
<!-- ###################################
TEST TABLEAU POUR AGENCER LE COTER ADMIN 
############################################-->

    
<div class="row">
    <div class="accordion" id="accordionAdminPage">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseCateryPage" aria-expanded="true" aria-controls="collapseCateryPage">
          Ajouter une catégorie ou une page
        </button>
      </h2>
    </div>

    <div id="collapseCateryPage" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionAdminPage">
      <div class="card-body ligne_table_adminPage">
      
      <div class="row">
   <div class="col-6"> 

    <!-- Début tableau ajout categorie -->

    <div class="container cont_table_admin_page">
        <table class="table-responsive-sm table_admin_page">
            <thead class="entete_tableau_adminPage">
                <tr>
                    <th>Nom de la Catégorie</th>
                    <th>URL de la Catégorie</th>
                    <th>Ajouter</th>
                    
                </tr>
            </thead>


            <tbody class="corps_tableau_adminPage">
           
                <form class="form-tableau" action="admin_pages" method="post">
                    <tr>
                  
                        <td><input type="text" value=""
                            name="title_cat_page" class="form-control" id="titreCategory" required></td>
                        <td><input type="text" value=""
                            name="name_cat_page" class="form-control" id="titreCategory" required></td>
                        
                        <td><button class="add_category_page"  type="submit" name="add_category_page" value="add"> <i class="fas fa-plus-circle"></i> </button></td>
                  
                    </tr>
                    
                </form>
            </tbody>
        </table>
        </div>
                </div>
                <div class="col-6"> 
                <div class="container cont_table_admin_page">
        <table class=" table-responsive-sm table_admin_page">
            <thead class="entete_tableau_adminPage">
                <tr>
                    <th>Nom de la Catégorie</th>
                    <th>URL de la Catégorie</th>
                    <th>Ajouter</th>
                    
                </tr>
            </thead>


            <tbody class="corps_tableau_adminPage">
           
                <form class="form-tableau" action="admin_pages" method="post">
                    <tr>
                  
                        <td><input type="text" value=""
                            name="title_cat_page" class="form-control" id="titreCategory" required></td>
                        <td><input type="text" value=""
                            name="name_cat_page" class="form-control" id="titreCategory" required></td>
                        
                        <td><button class="add_category_page"  type="submit" name="add_category_page" value="add"> <i class="fas fa-plus-circle"></i> </button></td>
                  
                    </tr>
                    
                </form>
            </tbody>
        </table>
        </div>
                </div>
                </div>
      </div>
    </div>
  </div>
 
</div>
</div>



<!-- DEUXIEME ACCORDEON TEST -->

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Modifier une catégorie de page
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

      <!-- DEBUT DU TABLEAU -->
      <div class="row">
      <div class="container cont_table_admin_page">
        <table class="table_admin_page">
            <thead class="entete_tableau_adminPage">
                <tr>

                    
                    <th>Choix de la Catégorie</th>
                    <th>Nom de la Catégorie</th>
                    <th>URL de la Catégorie</th>
                    <th>Date de création</th>
                    <th>Modifier une categorie</th>
                    <th>Supprimer une categorie</th>

                    

                </tr>
            </thead>


            <tbody class="corps_tableau_adminPage">
           
                <form class="form-tableau" action="admin_pages" method="post">
                
                    
                    <tr>
                   <td><select name="category_page" id="category_page" onChange="submit()" class="form-control">
                            <option value="">Choix catégorie</option>
                           <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                            <?php foreach ($liste_category_pages as $row) { ?>
                            <option value="<?php echo $row->id_category_page; ?>" <?php if ($row->id_category_page == @$_POST["category_page"]) {
                                                                                        echo " selected";
                                                                                    } ?>>
                                <?php echo stripslashes($row->title_category_page); ?>
                            </option>
                            <?php } ?>

                        </select></td>
                        <td><input type="text" value="<?php echo stripslashes(@$select_cat_page ->title_category_page); ?>"
                            name="title_cat_page" class="form-control" id="titreCategory" required></td>
                        <td><input type="text" value="<?php echo stripslashes(@$select_cat_page ->name_category_page); ?>"
                            name="name_cat_page" class="form-control" id="titreCategory" required></td>
                        <td><?php echo $row->date_category_page ?></td>
                        
                        <td><button class="update_category_page"  type="submit" name="update_category_page" value="update"> <i class="fas fa-pencil-alt"></i> </button></td>
                        <td><button class="delete_category_page" type="submit" name="delete_category_page" value="delete"> <i class="fas fa-trash-alt"></i> </button></td>
                        
                       
                  
                    </tr>
                    
                </form>
            </tbody>
        </table>
        </div>
        </div>
        <!-- FIN DU TABLEAU -->
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

 </div>
<?php require "footer_admin.php"; ?>