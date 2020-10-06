<?php

// fonction pour la barre de recherche
function recherche($recherche)
{
    global  $connection;
   
    $sql =  "SELECT *  FROM shop_products
    INNER JOIN shop_category ON shop_category.id_category_shop = shop_products.id_category_shop
    WHERE  shop_products.title_product LIKE '%$recherche%' AND shop_products.active = 1 OR shop_products.description_product LIKE '%$recherche%' 
    AND shop_products.active = 1  AND shop_products.active = 1 AND  shop_category.title_category_shop LIKE '%$recherche%'";

    // var_dump($sql);



    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}

?>