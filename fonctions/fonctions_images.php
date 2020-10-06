<?php 


/**
 * Permet de recupérer les images du produit et d'afficher une seule image sur le produit
 */
function recup_picture($id_product)
{
    global $connection;

    $sql = "SELECT * FROM shop_picture 
    INNER JOIN shop_products ON shop_products.id_product = shop_picture.id_product
    WHERE shop_picture.id_product = $id_product AND shop_products.active = 1 LIMIT 1";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatPicture;
}

/**
 * Permet de recupérer les images du produit et d'afficher toutes les images sur la page du produit
 */
function recup_all_picture($id_product)
{
    global $connection;

    $sql = "SELECT * FROM shop_picture
    INNER JOIN shop_products ON shop_products.id_product = shop_picture.id_product
    WHERE shop_picture.id_product = $id_product AND shop_products.active = 1";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatPicture;
}

/**
 * Permet de recupérer les images des articles et d'afficher une seule image sur l'article'
 */
function recup_picture_article($id_article)
{
    global $connection;

    $sql = "SELECT * FROM blog_picture_article
    INNER JOIN blog_articles ON blog_articles.id_article = blog_picture_article.id_article
    WHERE  blog_picture_article.id_article = '$id_article' AND blog_articles.active_article = 1 LIMIT 1";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatPicture;
}

/**
 * Permet de recupérer les images du produit et d'afficher toutes les images sur la page du produit
 */
function recup_all_picture_article($id_article)
{
    global $connection;

    $sql = "SELECT * FROM blog_picture_article
    INNER JOIN blog_articles ON blog_articles.id_article = blog_picture_article.id_article
    WHERE blog_picture_article.id_article = '$id_article' AND blog_articles.active_article = 1";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatPicture;
}

function recup_all_picture_content($id_content){

    global $connection;

    $sql = "SELECT * FROM picture_contents
    INNER JOIN page_contents ON page_contents.id_content = picture_contents.id_content
    WHERE picture_contents.id_content= $id_content";
    
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatPicture;
    
}





?>

