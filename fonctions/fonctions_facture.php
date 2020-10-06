<?php

// permet la récupération du panier joint avec la table shop_product et la table shop_payment 
//lié à l'utilisateur et a l'id_payment
function select_id_payment_bill($id_user, $id_payment)
{
    // récupération de la connection
    global $connection;
    $sql = "SELECT * FROM shop_cart
    INNER JOIN shop_products ON shop_products.id_product = shop_cart.id_product
    INNER JOIN shop_payment ON shop_payment.id_shop_payment = shop_cart.id_shop_payment
    WHERE shop_cart.id_user = $id_user AND shop_cart.id_shop_payment = $id_payment";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}

// permet la récupération de la facture avec son numéro lié à l'id_user 
// utilisé sur la page compte.php
function select_id_payment($id_user)
{
    // récupération de la connection
    global $connection;
    // selection des paiements de l'utilisateur
    $sql =  "SELECT * FROM shop_payment 
    WHERE id_user='$id_user' ORDER BY date_payment DESC";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}


// permet la récupération de la facture avec son numéro lié à l'id_user 
// utilisé sur la page facture.php
function select_id_payment_facture($id_user, $id_payment)
{
    // récupération de la connection
    global $connection;
    // selection des paiements de l'utilisateur
    $sql =  "SELECT * FROM shop_payment 
    WHERE id_user='$id_user' AND id_shop_payment ='$id_payment'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}

function frdate($date1)
{
    setlocale(LC_TIME, "fr_FR.UTF-8");
    $date2  = strftime("%d/%m/%Y", strtotime($date1));
    return $date2;
}

// fonction de vérification de l'id 
function verification_id_user($var_user)
{

    global $connection;
    $sql = "SELECT *
    
    FROM users
    INNER JOIN shop_payment ON shop_payment.id_user = users.id_user
    WHERE id_user = $var_user";
    var_dump($sql);
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_OBJ);

    return $resultat;
    // if ($var2 == isset($resultat->id_user)) {
    //     echo 'ok id existant';
    // } else {
    //     echo "id n'existent pas";
    // }

    //var_dump($resultat);
}
// fonction de vérification de l'id 
function verification_id_payment($var_id_payment)
{

    global $connection;
    $sql = "SELECT *
    FROM shop_payment
    INNER JOIN users ON users.id_user = shop_payment.id_user
    WHERE id_shop_payment = $var_id_payment";

    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_OBJ);

    return $resultat;
    // if ($var2 == isset($resultat->id_user)) {
    //     echo 'ok id existant';
    // } else {
    //     echo "id n'existent pas";
    // }

    //var_dump($resultat);
}
