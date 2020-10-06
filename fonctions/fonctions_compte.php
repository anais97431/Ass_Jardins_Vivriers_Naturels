<?php

/**
 * Permet de recupérer les utilisateurs pour modifier un compte
 */
function recup_user($id_user)
{
    global $connection;

    $sql = "SELECT * FROM users
    WHERE id_user = $id_user AND active = 1";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatRecup = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatRecup;
}

// Récupération de l'utilisateur connecté
function user_unique($id_user)
{
    // recupération de la connection
    global  $connection;
    $sql =  "SELECT *  FROM users
    WHERE id_user=$id_user";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}

/**
 * Permet de mettre a jour les information du compte
 */

function update_user($name, $last_name, $adress, $login, $id_user)
{
    global  $connection;


    $sql =  "UPDATE users
    SET  name = '$name', last_name = '$last_name', adress = '$adress', login = '$login'  
    WHERE id_user = $id_user";
    $sth = $connection->prepare($sql);
    $sth->execute();
}
