<?php

// permet la récuparartion des pages lié à la categorie
function recup_content_page()
{
    global  $connection;

    $sql =  "SELECT *  FROM page_contents
    INNER JOIN pages ON pages.id_page = page_contents.id_page
    WHERE page_contents.id_page= pages.id_page";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultat;
}



// permet la récuparartion d'un contenu unique
function single_content($id_page)
{

    global $connection;

    $sql = "SELECT * FROM page_contents
    INNER JOIN pages ON pages.id_page = page_contents.id_page
    LEFT JOIN picture_contents ON picture_contents.id_content = page_contents.id_content
    WHERE pages.id_page =  '$id_page'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultat;
}



//Pour afficher les images liées au contenu 
function unique_picture_content($id_content)
{

    global $connection;

    $sql = "SELECT * FROM picture_contents WHERE id_content = '$id_content'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatPicture;
}


function update_content($title_content, $text_content, $id_content)
{

    global  $connection;
    // Modification des contenus
    $sql =  "UPDATE page_contents
    SET title_content = '$title_content', text_content = '$text_content'
    WHERE id_content= '$id_content'";
    $sth = $connection->prepare($sql);
    $sth->execute();
}



function liste_content()
{
    global  $connection;
    // req ordonnée pas titre_article
    $sql = "SELECT * FROM page_contents 
    INNER JOIN pages ON pages.id_page = page_contents.id_page WHERE pages.id_page = 3
    ORDER BY title_content ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}

function liste_content_venteDirect()
{
    global  $connection;
    // req ordonnée pas titre_article
    $sql = "SELECT * FROM page_contents 
    INNER JOIN pages ON pages.id_page = page_contents.id_page WHERE pages.id_page = 4
    ORDER BY title_content ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}
