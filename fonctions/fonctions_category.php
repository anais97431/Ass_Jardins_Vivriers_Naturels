<?php 

// permet l'affichage des categories sur la page categories des produits
function liste_title_cat()
{
    global  $connection;
    $sql = "SELECT * FROM shop_category ";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}


// ajout des categories dans la table shop categorys
function add_category_shop($title_category_shop)
{
    // recup de la connection
    global $connection;
    // insert dans la table category
    $sql_ins = "INSERT INTO shop_category(title_category_shop) VALUES (:title_category_shop)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':title_category_shop' => $title_category_shop

    ));

    $id_shop_category = $connection->lastInsertId();
    return $id_shop_category;
}


// permet l'affichage des categories sur la page admin


function select_category($id_category_shop)
{
    global $connection;

    $sql = "SELECT * FROM shop_category
    WHERE id_category_shop = '$id_category_shop'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
}


// permet d'afficher les categories sur la page groupement achat

function select_category_achat()
{
    global $connection;

    $sql = "SELECT * FROM shop_category ";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatCat;
}


// permet d'afficher les categories sur la barre de navigation
function select_category_header()
{
    global $connection;

    $sql = "SELECT * FROM category_pages";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatCat;
}

// permet d'afficher les categories sur la barre de navigation
function select_category_navbar($id_category_page)
{
    global $connection;

    $sql = "SELECT * FROM category_pages
    WHERE id_category_page='$id_category_page'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat2 = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatCat2;
}


// permet d'afficher les pages sur la barre de navigation
function select_category_pages($id_category_page)
{
    global $connection;

    $sql =  "SELECT * FROM category_pages
    INNER JOIN pages ON pages.id_category_page = category_pages.id_category_page
    WHERE pages.id_category_page = $id_category_page";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat3 = $sth->fetchAll(PDO::FETCH_OBJ);
    

     return $resultatCat3 ;
}


// permet l'affichage des categories sur la page admin dans l'input une fois selectionné


function select_category_page($id_category_page)
{
    global $connection;

    $sql = "SELECT * FROM category_pages
    WHERE id_category_page = '$id_category_page'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
}
// Fonction permettant de faire le compte des lignes de la table category_page
function select_count_categoryPage(){

    global $connection;

    $sql = "SELECT COUNT(*) AS total FROM category_pages";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
    // var_dump($resultatCat);
}


// Fonction permettant de faire le compte des lignes de la table shop_category
function select_count_shopCategory(){

    global $connection;

    $sql = "SELECT COUNT(*) AS total FROM shop_category";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
    // var_dump($resultatCat);
}

// Fonction permettant de faire le compte des lignes de la table blog_categorys_articles
function select_count_blogCategory(){

    global $connection;

    $sql = "SELECT COUNT(*) AS total FROM blog_categorys_articles";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
    // var_dump($resultatCat);
}

// Fonction permettant de faire le compte des lignes de la table blog_articles
function select_count_blogArticles(){

    global $connection;

    $sql = "SELECT COUNT(*) AS total FROM blog_articles";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
    // var_dump($resultatCat);
}


// Fonction permettant de faire le compte des lignes de la table page
function select_count_page(){

    global $connection;

    $sql = "SELECT COUNT(*) AS total FROM pages";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
    // var_dump($resultatCat);
}

// Fonction permettant de faire le compte des lignes de la table shop_products
function select_count_shopProduct(){

    global $connection;

    $sql = "SELECT COUNT(*) AS total FROM shop_products";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
    // var_dump($resultatCat);
}

// Fonction permettant de modifier les catégories de pages
function  update_category_page($id_category_page, $category_page_name,$name_category_page)
{
    global  $connection;

    $sql =  "UPDATE category_pages
    SET  title_category_page= '$category_page_name', name_category_page= '$name_category_page'
    WHERE id_category_page = $id_category_page";
    $sth = $connection->prepare($sql);
    $sth->execute();


    //header('Location: admin.php');
}

// ajout des categories dans la table category  de la partie pages
function add_category_pages($title_category_page,$name_category_page)
{
    // recup de la connection
    global $connection;
    // insert dans la table category
    $sql_ins = "INSERT INTO category_pages(title_category_page, name_category_page) VALUES (:title_category_page, :name_category_page)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':title_category_page' => $title_category_page,
        ':name_category_page' => $name_category_page
    ));

   
}

// permet d'afficher les categories sur la page boutique
function select_category_product()
{
    global $connection;

    $sql = "SELECT * FROM shop_category";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatCat;
}


// recuperation des categories pour la boutique

function recup_category()
{
    global  $connection;

    $sql =  "SELECT *  FROM shop_category
    INNER JOIN shop_products ON shop_products.id_shop_category = shop_category.id_shop_category
    WHERE shop_ products.active=1";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}


// mise a jour des categories des produits 
function  update_category($id_shop_category, $title_shop_category)
{
    global  $connection;

    $sql =  "UPDATE shop_category
    SET  title_category_shop= '$title_shop_category'
    WHERE id_category_shop = $id_shop_category";
    $sth = $connection->prepare($sql);
    $sth->execute();

    img_load_cat($id_shop_category);

    //header('Location: admin.php');
}


/**
 * liste des categories des actualités
 */
// 
function liste_cat_blog()
{
    global  $connection;
    $sql = "SELECT * FROM blog_categorys_articles";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}


// ajout des categories dans la table category  de la partie actualité
function add_category_blog($category_article_name)
{
    // recup de la connection
    global $connection;
    // insert dans la table category
    $sql_ins = "INSERT INTO blog_categorys_articles(category_article_name) VALUES (:category_article_name)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':category_article_name' => $category_article_name

    ));

   
}

// mise a jour des categories d'article
function  update_category_article($id_category_article, $category_article_name)
{
    global  $connection;

    $sql =  "UPDATE blog_categorys_articles
    SET  category_article_name= '$category_article_name'
    WHERE id_category_article = $id_category_article";
    $sth = $connection->prepare($sql);
    $sth->execute();

    //var_dump($sth);
}

// permet l'affichage des categories sur la page admin dans l'input une fois selectionné


function select_category_article($id_category_article)
{
    global $connection;

    $sql = "SELECT * FROM blog_categorys_articles
    WHERE id_category_article = '$id_category_article'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatCat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultatCat;
}

// permet l'affichage des categories sur la page admin_pages
function liste_title_cat_pages()
{
    global  $connection;
    $sql = "SELECT * FROM category_pages ";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}
