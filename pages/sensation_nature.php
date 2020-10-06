<?php
require "header.php";
require "../fonctions/fonctions_pages.php";

$id_category_page = htmlspecialchars(@$_GET["id"]);
// $id_page = htmlspecialchars(@$_POST["id_page"]);



// $recup_page = recup_pages_emplettes_by_id($id_category_page);
// $recup_emplette = recup_pages_emplettes($id_category_page)

?>



<!-- <div class="container-fluid"> -->
<div class="row mr-0 mx-0 sensation_nature_ligne">



    <!-- COLONNE POUR LES CHERUBINS -->
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

        <div class=" les_cherubins_col">
            <a href="les_cherubins.php">
                <div class="les_cherubins_lien" style="background-image:url(../uploads/)">
                    <h1>Les chérubins, <br>éducation à la nature</h1>
                    <input type="hidden" name="id_page" value="">

                </div>
            </a>
        </div>
    </div>
    <!-- FIN DE COLONNE -->
    <!-- COLONNE POUR ATELIERS FORMATIONS -->
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

        <div class=" ateliers_formations_col">
            <a href="ateliers_formations.php">
                <div class="atelier_formation_lien">

                    <h1>Ateliers et formations</h1>
                    <input type="hidden" name="id_page" value="">
                </div>
            </a>
        </div>
    </div>
    <!-- FIN DE COLONNE -->
    <!-- COLONNE POUR CONFERENCES ET SORTIES -->
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class=" conference_sortie_col">
            <a href="conferences_sorties.php">
                <div class="conferences_sorties_lien">

                    <h1>Conférences et sorties</h1>
                    <input type="hidden" name="id_page" value="">
                </div>
            </a>
        </div>
    </div>


    <!-- FIN DE COLONNE -->
</div>

<!-- </div> -->













<?php require "footer.php"; ?>