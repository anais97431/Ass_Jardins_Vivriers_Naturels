<?php
require "header.php";
require "../fonctions/fonctions_pages.php";

$id_category_page = htmlspecialchars(@$_GET["id"]);
// $id_page = htmlspecialchars(@$_POST["id_page"]);



$recup_page = recup_pages_emplettes_by_id($id_category_page);
$recup_emplette = recup_pages_emplettes();
//var_dump($recup_emplette);
?>



<!-- <div class="container-fluid"> -->
<div class="row mr-0 mx-0 emplette_ligne">



    <!-- COLONNE POUR LE GROUPEMENT D'ACHAT -->
    <div class="col-lg-7 col-md-7 col-sm-12">

        <div class=" groupAchat_ligne">
            <a href="groupement_achat.php?id=<?php echo $id_category_page ?>&id_page=<?php echo $recup_page[0]->id_page ?>">
                <div class="group_achat_lien" style="background-image:url(../uploads/<?php echo @$recup_page[0]->img_page; ?>)">
                    <h2><?php echo @$recup_page[0]->title_page ?></h2>
                    <input type="hidden" name="id_page" value="<?php echo $recup_page[0]->id_page ?>">

                </div>
            </a>
        </div>
    </div>
    <!-- FIN DE COLONNE -->
    <!-- COLONNE POUR ACHAT RAISONNE ET VENTE DIRECT -->
    <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="row mr-0 mx-0 achatRaisonne_ligne">
            <a href="achat_raisonne.php?id=<?php echo $id_category_page ?>&id_page=<?php echo $recup_page[1]->id_page ?>&id_content=<?php echo $recup_emplette[0]->id_content ?>">
                <div class="achat_raisonne" style="background-image:url(../uploads/<?php echo @$recup_page[1]->img_page; ?>)">

                    <h4><?php echo @$recup_page[1]->title_page ?></h4>
                    <input type="hidden" name="id_page" value="<?php echo $recup_emplette[0]->id_page ?>">
                </div>
            </a>
        </div>
        <div class="row mr-0 mx-0 venteDirect_ligne">

            <a href="vente_directe.php?id=<?php echo $id_category_page ?>&id_page=<?php echo $recup_page[2]->id_page ?>&id_content=<?php echo $recup_emplette[1]->id_content ?>">
                <div class="vente_direct" style="background-image:url(../uploads/<?php echo @$recup_page[2]->img_page; ?>)">

                    <h4><?php echo @$recup_page[2]->title_page ?></h4>
                    <input type="hidden" name="id_page" value="<?php echo $recup_emplette[1]->id_page ?>">
                </div>
            </a>
        </div>
    </div>

    <!-- FIN DE COLONNE -->
</div>

<!-- </div> -->













<?php require "footer.php"; ?>