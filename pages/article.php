<?php
require "header.php";
require "../fonctions/fonctions_articles_blog.php";
require "../fonctions/fonctions_images.php";

// recup du GET id
@$id_article = $_GET["id_article"];

// recup de la fonction article_unique
$article_uni = article_unique($id_article);

// recup des post
@$ajouter = $_POST["ajouter"];
@$commentaire = $_POST["commentaire"];

// $_SESSION["nom"];
// $_SESSION["prenom"];

//si clic sur ajouter on insert le commentaire
if ($ajouter) {
    add_com($id_article, $commentaire);
}

// recup de la fonction liste_com
$recup_com = liste_com($id_article);
$recup_pictures = recup_all_picture_article($id_article);
?>

<!-- affichage des valeurs avec un echo et protection de la valeur qui arrive-->
<div class="row ligne_article">
   
             <div class="col-lg-6 col-md-6 col-12 article">
             
                 <h1 id="h1"><?php echo stripslashes($article_uni->title_article); ?></h1>
                 <?php foreach ($recup_pictures as $row) { ?>
                 <img class="vignette" width="250" src="../uploads/<?php echo @$row->title_picture_article ?>" alt="">
                 <?php } ?>
                <p class="contenu_article"><?php echo stripslashes($article_uni->article); ?></p>
            </div>
</div>
    <hr>
<div class="container">
    <?php if ($article_uni->comment) { ?>

    <form action="article.php?id_article=<?php echo $id_article; ?>" method="post">
        <label for="com">Ajouter votre commentaire.</label>
        <textarea name="commentaire" class="form-control" maxlenght="300" id="com" cols="30" rows="5"></textarea>

        <input type="submit" class="btn" name="ajouter" value="Ajouter">



    </form>

    <?php } ?>
   </div>
   <div class="container">
    <?php foreach ($recup_com as $row) { ?>
    <div>
        
        <p><?php echo $row->comment ?></p>
        <p><?php echo frdate($row->create_comment) ?></p>
        <p><?php echo $row->autor ?></p>
        
    </div>
    <?php } ?>

    </div>


    <?php include "footer.php"; ?>

