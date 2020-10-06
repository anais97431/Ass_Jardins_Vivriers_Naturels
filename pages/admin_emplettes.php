<?php 
require "header_admin.php";
require "navbar_vertical.php";
require "../fonctions/upload_page.php";
require "../fonctions/fonctions_pages.php";


if (isset($_SESSION["role"]) != 5) {
    
    header('Location: login.php');

}
if (isset($_POST)) {

    // var_dump($_POST);

    // recup des post
    // il faut proteger les posts

   
    @$id_page = htmlspecialchars($_POST["id_page"]);
    @$id_category_page = htmlspecialchars($_POST["id_category_page"]);
    @$id_user = htmlspecialchars($_POST["id_user"]);
    @$update_page =  htmlspecialchars($_POST["update_page"]);
    @$disabled_page =  htmlspecialchars($_POST["delete_page"]);
    @$photos = htmlspecialchars($_POST["photos[]"]);
    @$title_category_page = htmlspecialchars($_POST["title_cat_page"]);
    @$title_page = htmlspecialchars($_POST["title_page"]);
    @$url_page = htmlspecialchars($_POST["url_page"]);
    
//var_dump($_POST);

    // var_dump($_POST);
}

// si on clic sur le bouton modifier: permet l'appel de la fonction update_page pour modifier une page et la fonction insert_content pour ajouter des descriptions
// Protege l'entrée
if ($update_page) {
  
   
    update_page(addslashes($url_page), addslashes($title_page),$id_category_page, $id_page);
    img_load_page($id_page);
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
   
// PERMET L'AFFICHAGE DE LA LISTE  DES CATEGORIES DANS LE SELECT
$liste_category_pages = liste_title_cat_pages();

//var_dump($liste_category_pages);
// permet de faire apparaite les titres des pages dans le select
$liste_titre_page =  liste_pages_emplettes();

?>



<div class="main">

<h4>Modification du contenu de la page : "Emplettes solidaires" :</h4>
  <form class="form-tableau" action="admin_emplettes.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
           
  <div class="form-group col-md-6">
            <!-- LISTE DES TITRES -->
           
            <label class="formulaire" for="">Choix du titre*</label><br>
            <select name="id_page" id="id_page" onChange="submit()" class="form-control">
                <option value="">Choix du titre</option>
                <!-- Boucle permettant de recupérer dans le select le titre de l'article -->
                <?php foreach ($liste_titre_page as $row) { ?>
                <option value="<?php echo $row->id_page; ?>" <?php if ($row->id_page == @$_POST["id_page"]) {
                                                                        echo " selected";
                                                                    } ?>>
                    <?php echo stripslashes($row->title_page); ?>
                </option>
                <?php } ?>

            </select>

        </div>
        <div class="form-group col-md-6">
            <!-- LISTE CATEGORIES -->
            <label for="inputTitrePage">Titre catégorie*</label>
      <input type="text" value="<?php echo stripslashes(@$single_page->title_category_page); ?>" name="title_page" class="form-control"  id="inputTitrePage" disabled>
            
            <input type="hidden" name="id_category_page" value="<?php echo $row->id_category_page ?>">
        </div>
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
      <input type="text" name="url_page" class="form-control" value="<?php echo stripslashes(@$single_page->url_page); ?>">
    </div>
  </div>
        
        <br><br>

   <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
   <input type="file" name="photos[]" multiple><br><br>

<img width="100" src="../uploads/<?php echo @$single_page->img_page; ?>" alt=""><br>
<?php echo @$single_page->img_page; ?><br>





    

        <button class="btn btn-warning"  type="submit" name="update_page" value="update"><i class="fas fa-pencil-alt"></i> Modifier</button>
        <button class="btn btn-danger" type="submit" name="delete_page" value="delete"><i class="fas fa-trash-alt"></i> Supprimer</button>
</form>

</div>
</div>















<?php 
require "footer_admin.php";

?>