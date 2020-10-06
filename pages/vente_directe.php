<?php
require "header.php";

require "../fonctions/fonctions_pages.php";
require "../fonctions/fonctions_images.php";
require "../fonctions/fonctions_content.php";

$id_category_page = htmlspecialchars(@$_GET["id"]);
$id_page = htmlspecialchars(@$_GET["id_page"]);
$id_content = htmlspecialchars(@$_GET["id_content"]);


$recup_pictures = recup_all_picture_content($id_content);
$recup_content = recup_content_page();
$recup_page = recup_pages_emplettes_by_id($id_category_page);

?>


<div class="row mr-0 mx-0 achatRaiso_titre">
    <div class="container container_achatRaiso_titre">
        <h3><?php echo @$recup_content->title_content ?></h3>
        <input type="hidden" name="id_page" value="<?php echo $recup_content->id_page ?>">
        <input type="hidden" name="id_content" value="<?php echo $recup_content->id_content ?>">
    </div>
</div>

<div class="row mr-0 mx-0 achatRaiso_ligne2">

    <div class="container group_achat_lien">

        <p class="content_achatRaisonne"><?php echo $recup_content->text_content ?> </p>


    </div>
    <div class="row mr-0 mx-0 achatRaiso_ligne">
        <?php foreach (@$recup_pictures as $row) { ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col_img">

                <div class="achatRaisonne_image">
                    <img class="" src="../uploads/<?php echo @$row->title_picture_content ?>" alt="">

                </div>
            </div>
        <?php } ?>
    </div>

</div>



























<?php require "footer.php"; ?>