<?php


function add_product($title_product, $id_category_shop, $description_product, $price_product, $stock)
{
    // recup de la connection
    global $connection;
    
    // insert dans la table articles
    $sql_ins = "INSERT INTO shop_products(title_product, id_category_shop, description_product, price_product, stock) VALUES (:title_product, :id_category_shop, :description_product, :price_product, :stock)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':title_product' => $title_product,
        ':id_category_shop' => $id_category_shop,
        ':description_product' => $description_product,
        ':price_product' => $price_product,
        ':stock' => $stock
       


    ));
    // recuperation de id_article
    $id_product = $connection->lastInsertId();

  
    return $id_product;
}

// recup liste product
function liste_product()
{
    global  $connection;
    //  req ordonnée par titre du produit
    $sql = "SELECT * FROM shop_products 
     ORDER BY title_product ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}

// rend inactif un produit appel sur le bouton supprimer
function disabled_product($id_product)
{

    global  $connection;

    $sql =  "UPDATE shop_products
    SET active = 0
    WHERE id_product = $id_product";
    $sth = $connection->prepare($sql);
    $sth->execute();
    header('Location: admin.php');
}

// selection du produit unique avec un inner join
function unique_product($id_product)
{
    global $connection;

    $sql = "SELECT *  FROM shop_category
    INNER JOIN shop_products ON shop_products.id_category_shop = shop_category.id_category_shop
    LEFT JOIN shop_picture ON shop_products.id_product = shop_picture.id_product
    WHERE shop_products.id_product = '$id_product'";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultatUnique = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatUnique;
}

// Modification du produit
function update_product($id_product, $id_category_shop, $title_product, $price_product, $description_product, $stock, $active)
{
    global  $connection;

    // Lien avec la checkbox si active est egale a rien la valeur est a 0
    if ($active == '') {
        $active = 0;
    }

    $sql =  "UPDATE shop_products
      SET id_category_shop = '$id_category_shop', title_product='$title_product', price_product='$price_product', description_product= '$description_product', stock= '$stock', active= '$active'
      WHERE id_product = $id_product";
       $sth = $connection->prepare($sql);
        $sth->execute();
    

    // $resultat = $sth->fetch(PDO::FETCH_OBJ);

    // return $resultat;
    // modification de liaisons
    //   $sql =  "UPDATE categorys
    //   SET id_category = '$id_category'
    //   WHERE id_product = $id_product";
    //   $sth = $connection->prepare($sql);
    //      $sth->execute();


}


/**
 * permet de passer les produit en actif pour les afficher sur la page produit via la checkbox sur la page admin
 */
function active_product($id_product)
{

    global  $connection;

    $sql =  "UPDATE shop_products
    SET active = 1
    WHERE id_product= '$id_product'";
    $sth = $connection->prepare($sql);
    $sth->execute();
}

/**
 * recupération des images associées aux produits
 */
function unique_picture($id_product)
{
    global $connection;

    $sql ="SELECT * FROM shop_picture WHERE id_product = '$id_product'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatPicture;
}

/**
 * Permet le recupération des produits par l'id category pour afficher sur les pages par categorie
 */
function recup_products_by_id($id_category)
{
    global  $connection;

    $sql =  "SELECT *  FROM shop_products
    INNER JOIN shop_category ON shop_category.id_category_shop = shop_products.id_category_shop
    WHERE shop_products.id_category_shop= '$id_category' AND shop_products.active = 1";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}



/**
 * Permet le recupération les produits par les id pour afficher sur la page product
 */
function recup_all_products_by_id($id_product)
{
    global  $connection;

    $sql =  "SELECT *  FROM shop_products
    WHERE shop_products.id_product= $id_product AND shop_products.active = 1";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}


?>