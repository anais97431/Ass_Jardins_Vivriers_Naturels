<?php


/**
 * Permet de recupérer le produit pour l'afficher dans le panier 
 */
function recup_all_product($id_user)
{
    global $connection;

    $sql = "SELECT * FROM shop_cart
    INNER JOIN shop_products ON shop_products.id_product = shop_cart.id_product
    INNER JOIN users ON users.id_user = shop_cart.id_user
    WHERE users.id_user = $id_user  AND shop_cart.active = 1";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}


/**
 * Permet l'ajout au panier des infos du produit
 * Permet de rajouter à la quantity si le produit est déjà dans le panier
 */


function  insert_cart($id_product, $id_user, $price_product, $quantity_cart)
{


    global $connection;

    // permet de récupérer les information des produits ajouter dans le panier
    // Cela permet de mettre a jour la quantité si le produit est déjà existant dans le panier

    $sql = "SELECT id_product FROM shop_cart 
    WHERE shop_cart.id_user = $id_user AND id_product = $id_product AND active=1";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    // Si on on a un résultat avec le SELECT on peut lancer la fonction qui permet de mettre à jour la quantité

    if ($resultat) {
        update_cart($id_user, $id_product, $quantity_cart);
    } else {

        //Sinon on insert les informations du produit dans la table panier
        $sql_ins = "INSERT INTO  shop_cart(id_product, id_user, price_product, quantity_cart) VALUES (:id_product, :id_user, :price_product, :quantity_cart)";

        $sth = $connection->prepare($sql_ins);
        $sth->execute(array(
            ':id_product' => (int) $id_product,
            ':id_user' => (int) $id_user,
            ':price_product' => (int) $price_product,
            ':quantity_cart' => (int) $quantity_cart


        ));
    }
}

function liste_quantity($id_product)
{
    global  $connection;
    //  req ordonnée par titre du produit
    $sql = "SELECT id_product, stock FROM shop_products
    WHERE id_product = $id_product";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultat;
}

/**
 * Permet de mettre a jour la quantité des produits
 */

function update_cart($id_user, $id_product, $quantity_cart)
{

    global $connection;

    $sql =  "UPDATE shop_cart
    SET  quantity_cart = quantity_cart + $quantity_cart
    WHERE id_user = $id_user AND id_product=$id_product";
    $sth = $connection->prepare($sql);
    $sth->execute();
}

function update_quantity_cart($id_user, $id_product, $quantity_cart)
{

    global $connection;

    $sql =  "UPDATE shop_cart
    SET  quantity_cart =  $quantity_cart
    WHERE id_user = $id_user AND id_product=$id_product";
    $sth = $connection->prepare($sql);
    $sth->execute();
}

// désactive le produit et supprime la ligne dans le panier
function disabled_product_cart($id_product)
{
    global  $connection;

    $sql =  "UPDATE shop_cart
    SET active = 0
    WHERE id_product = $id_product";
    $sth = $connection->prepare($sql);
    $sth->execute();
}


function delet_cart($id_user)
{
    global  $connection;

    $sql =  "DELETE shop_cart
    WHERE id_user = $id_user AND id_payment = NULL";
    $sth = $connection->prepare($sql);
    $sth->execute();
}


function  insert_payment($id_user)
{

    global $connection;

    //On sélectionne le dernier numéro de facture dans la table shop_payment
    $sql = "SELECT MAX(number_ordered) as number_ordered FROM shop_payment";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_OBJ);

    // et on l'incrémente de +1 avant de l'ajouter 
    $res =   $resultat->number_ordered + 1;

    $sql_ins = "INSERT INTO  shop_payment(id_user, number_ordered) VALUES (:id_user, :number_ordered)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':id_user' => $id_user,
        ':number_ordered' => $res

    ));

    //On récupère l'id payment qui vient de se créer et qu'on ne pouvait pas connaître avant l'insert afin de le réinjecter dans l'update du cart.
    $id_payment = $connection->lastInsertId();


    // Mise à jour de l'id_shop_payment dans le panier et changement de l'état de validation à 1 (= paiement accepté) où l'id_user correspond au paiement 
    // et où il n'y a pas encore d'id_shop_payment qu'on vient justement MAJ via cet update après récuprération par lastInsertId(). On rédirige ensuite l'user 
    // vers l'index en faisant passer la mention success dans l'URL pour faire un _GET et déclencher une modal de confirmation de commande (cf footer)
    $sql =  "UPDATE shop_cart
    SET id_shop_payment = $id_payment, validation_payment =1
    WHERE id_user = $id_user AND id_shop_payment = 0";
    $sth = $connection->prepare($sql);
    $sth->execute();


    //MAJ des stocks produits. Dans la table cart je select tout et je cible les id_payment pour travailler sur ceux qui concordent avec l'id_shop_payment 
    //qui vient d'être créé lors du dernier paiement. Avec un fetchAll je récupère tout dont l'id_product qui me servira ensuite à faire un UPDATE. 
    //Attention, dans la table cart il peut y avoir plusieurs id_product (autant que de produits achetés) attachées à un seul id_payment. 
    $sql = "SELECT * FROM shop_cart 
    WHERE id_shop_payment = $id_payment";

    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    // On fait tourner le résultat dans un foreach pour faire un UPDATE dans la table shop_products : 
    //On SET le stock en lui retirant la quantity_cart qui vient d'être achetée en ciblant l'id_product (WHERE) concerné. 

    foreach ($resultat as $row) {

        $sql = "UPDATE shop_products
        SET stock = stock - $row->quantity_cart  
        WHERE id_product= $row->id_product";
        $sth = $connection->prepare($sql);
        $sth->execute();
    }

    header("Location: index.php?success=true&id_user=$id_user");
    exit();
}
