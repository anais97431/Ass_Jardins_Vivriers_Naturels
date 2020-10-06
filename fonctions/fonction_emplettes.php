<?php

session_start();


require "../fonctions/fonctions_category.php";
require "../fonctions/fonctions_images.php";
require "../fonctions/fonctions_panier.php";
require "../fonctions/fonctions_products.php";
require "../fonctions/fonctions_tva.php";






/**
 * recuperation des id 
 */
// function insert_liaison($id_product, $id_user)
// {
//     // recup de la connection
//     global $connection;

//     $sql_ins = "INSERT INTO  carts(id_product, id_user) VALUES (:id_product, :id_user)";

//     $sth = $connection->prepare($sql_ins);
//     $sth->execute(array(
//         ':id_product' => $id_product,
//         ':id_user' => $id_user,


//     ));
// }












    //detruire l'image si différente de la nouvelle image uploadée

    // if ($_FILES["image"]["name"] != "") {






    //     if ($resultat->title_picture != $_FILES["image"]["name"]) {

    //         @unlink("upload/" . $resultat->title_picture);

    //         $filename = img_load($id_product);
    //     }
    // }


    ?>