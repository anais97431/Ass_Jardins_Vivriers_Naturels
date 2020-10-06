<?php

include "../fonctions/fonctions_articles_blog.php";
require "header_admin.php";

@$validate_com = $_POST["validate_com"];
@$id_commentaire = $_POST["commentaire"];
@$delete_com = $_POST["delete_com"];

if ($validate_com) {
    valid_com($id_commentaire);
}

if ($delete_com) {
    delete_com($id_comment);

}

$liste_com = complete_list_comment();
//var_dump($liste_com)
?>


<div id="moderateur" class="container">
    <?php foreach ($liste_com as $row) { ?>
    <form action="moderateur.php" method="post">
        <div> titre de l'article : <?php echo $row->title_article ?></div>
        <p> Numéro du commentaire :<input type="hidden" name="commentaire" value="<?php echo $row->id_comment; ?>"></p>
        <div>Numéro de l'article : <?php echo $row->id_article ?></div>
        <div>Commentaire laisser : <?php echo $row->comment ?></div>
        <input type="submit" class="button" name="validate_com" value="Valider">
        <input type="submit" class="button" name="delete_com" value="Supprimer">
        <hr>
    </form>
    <?php } ?>
</div>

<?php require "footer_admin.php" ?>