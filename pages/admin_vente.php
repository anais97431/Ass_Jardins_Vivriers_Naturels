<?php 
require "header_admin.php";
require "navbar_vertical.php";
require "../fonctions/upload_page.php";
require "../fonctions/fonctions_pages.php";
require "../fonctions/upload_content.php";
require "../fonctions/fonctions_content.php";


if (isset($_SESSION["role"]) != 5) {
    
    header('Location: login.php');

}
if (isset($_POST)) {

    // var_dump($_POST);

    // recup des post
    // il faut proteger les posts

   
    @$id_content = htmlspecialchars($_POST["id_content"]);
    @$id_page = htmlspecialchars($_POST["id_page"]);
    @$id_user = htmlspecialchars($_POST["id_user"]);
    @$update_content =  htmlspecialchars($_POST["update_content"]);
    @$disabled_content =  htmlspecialchars($_POST["delete_content"]);
    @$photos = htmlspecialchars($_POST["photos[]"]);
    @$title_category_page = htmlspecialchars($_POST["title_cat_page"]);
    @$title_content= htmlspecialchars($_POST["title_content"]);
    @$text_content = htmlspecialchars($_POST["text_content"]);
    
//var_dump($_POST);

    // var_dump($_POST);
}

// si on clic sur le bouton modifier: permet l'appel de la fonction update_page pour modifier une page et la fonction insert_content pour ajouter des descriptions
// Protege l'entrée
if ($update_content) {
  
   
    update_content(addslashes($title_content), addslashes($text_content), $id_content);
    img_load_content($id_content);
    $pictureContent = unique_picture_content($id_content);

   
}

// si on selectionne une page dans le select: permet l'appel de la fonction single_page pour appeler une page 
//PERMET D'AFFICHER, DE RECUPÉRER L'ENSEMBLE DES INFOS SUR LA PAGE
if(isset($id_content)){
 
    // var_dump($presentation_page);
    
    $single_content = single_content($id_page);
    $pictureContent = unique_picture_content($id_content);
   
    // $presentation_page = presentation_page($id_page);

    // $Picture_article = unique_picture_article($id_article);
}
   

// permet de faire apparaite les titres des pages dans le select
$liste_titre_content =  liste_content_venteDirect();

//var_dump($liste_page);
?>



<div class="main">

<h4>Modification du contenu de la page : "Vente directe, circuits courts " :</h4>
  <form class="form-tableau" action="admin_vente.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
           
  <div class="form-group col-md-6">
            <!-- LISTE DES TITRES ET TITRE DE LA PAGE -->
            <label for="inputTitrePage">Titre de la page*</label>
      <input type="text" value="<?php echo stripslashes(@$single_content->title_page); ?>" name="title_content" class="form-control"  id="inputTitrePage" disabled><br>
            <label class="formulaire" for="">Choix du titre*</label><br>
            <select name="id_content" id="id_content" onChange="submit()" class="form-control">
                <option value="">Choix du titre</option>
                <!-- Boucle permettant de recupérer dans le select le titre de du contenu -->
                <?php foreach ($liste_titre_content as $row) { ?>
                <option value="<?php echo $row->id_content; ?>" <?php if ($row->id_content == @$_POST["id_content"]) {
                                                                        echo " selected";
                                                                    } ?>>
                    <?php echo stripslashes($row->title_content); ?>
                </option>
                <?php } ?>

            </select><br>

            <label for="inputTitrePage">Titre du contenu*</label>
      <input type="text" value="<?php echo stripslashes(@$single_content->title_content); ?>" name="title_content" class="form-control"  id="inputTitrePage" required>
        </div>
        <div class="form-group col-md-6">
            <!-- CONTENU -->
            
            <label for="">Présentation contenu*</label>
      <textarea name="text_content" id="editor" class="form-control" cols="30"
                    rows="10"><?php echo stripslashes(@$single_content->text_content); ?></textarea>
    </div>
            <input type="hidden" name="id_page" value="<?php echo $row->id_page ?>">
        </div>
     
        <br>

       
<!--Titre page: le echo permet de recupérer la valeur qui est dans le base de donnée -->
<div class="form-row">
    <div class="form-group col-md-6">
      
    </div>
    <!-- URL Page le echo permet de recupérer la valeur qui est dans le base de donnée-->
    <div class="form-group col-md-6">
     
    </div>
  </div>
        
        <br><br>

   <!-- IMAGE: permet de charger une image, le echo permet d'afficher l'image déjà présente dans l'article-->
   <input type="file" name="photos[]" multiple><br><br>
        <div>
            <?php if (isset($id_content)) { ?>
            <!--Via le foreach on accède à $image_unique sous forme de "tableau" qu'on segmente ensuite en ligne (row)-->
            <?php foreach (@$pictureContent as $row) { ?>
                
            <!--Et dans le row on va chercher le champ name_image_product pour l'afficher dans une balise image via un echo-->
            <img width="100" src="../uploads/<?php echo @$row->title_picture_content ?>" alt="">
            <?php } ?>
            <?php } ?>

        </div>




    

        <button class="btn btn-warning"  type="submit" name="update_content" value="update"><i class="fas fa-pencil-alt"></i> Modifier</button>
        <button class="btn btn-danger" type="submit" name="delete_content" value="delete"><i class="fas fa-trash-alt"></i> Supprimer</button>
</form>

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
require "footer_admin.php";

?>