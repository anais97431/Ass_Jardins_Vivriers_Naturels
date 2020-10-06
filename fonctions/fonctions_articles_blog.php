<?php
function add_article($title_article, $short_article, $article, $date_article, $id_category_article, $id_user, $commentaire)
{
    // recup de la connection
    global $connection;
    // insert dans la table articles
    $sql_ins = "INSERT INTO blog_articles(title_article, short_article, article, create_article, comment) VALUES (:title_article,:short_article,:article,:create_article, :comment)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':title_article' => $title_article,
        ':short_article' => $short_article,
        ':article' => $article,
        ':create_article' => $date_article,
        ':comment' => $commentaire


    ));
    // recuperation de id_article
    $id_article = $connection->lastInsertId();

    $id_user = $_SESSION["id_user"];
    // appel la function pour passer les id
    add_liaison($id_article, $id_category_article, $id_user);


    return $id_article;
}

/**
 * recuperation des id 
 */
function add_liaison($id_article, $id_category_article, $id_user)
{
    // recup de la connection
    global $connection;

    $sql_ins = "INSERT INTO  blog_link_table(id_article, id_user, id_category_article) VALUES (:id_article, :id_user, :id_category_article)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':id_article' => $id_article,
        ':id_user' => $id_user,
        ':id_category_article' => $id_category_article

    ));
}


/**
 * recuperation des articles sur la base liaisons
 */


function recup_articles()
{
    global  $connection;

    $sql =  "SELECT *  FROM blog_link_table
    INNER JOIN users ON users.id_user = blog_link_table.id_user
    INNER JOIN blog_articles ON blog_articles.id_article = blog_link_table.id_article
    INNER JOIN blog_categorys_articles ON blog_categorys_articles.id_category_article = blog_link_table.id_category_article
    WHERE blog_articles.active_article = 1 
    ORDER BY create_article DESC
    LIMIT 4 ";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}

function recup_all_article_blog()
{
    global  $connection;

    $sql =  "SELECT *  FROM blog_link_table
    INNER JOIN users ON users.id_user = blog_link_table.id_user
    INNER JOIN blog_articles ON blog_articles.id_article = blog_link_table.id_article
    INNER JOIN blog_categorys_articles ON blog_categorys_articles.id_category_article = blog_link_table.id_category_article
    WHERE blog_articles.active_article = 1 
    ORDER BY create_article DESC";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}



// recup liste titres actif des articles
function liste_titre()
{
    global  $connection;
    // req ordonnée par titre_article
    $sql = "SELECT id_article, title_article FROM blog_articles 
    WHERE active_article=1
    ORDER BY title_article ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}

// recup un article demandé par id_article
function article_unique($id_article)
{

    global  $connection;

    $sql =  "SELECT *  FROM blog_link_table
    INNER JOIN blog_articles ON blog_articles.id_article = blog_link_table.id_article
    INNER JOIN users ON users.id_user = blog_link_table.id_user
    INNER JOIN blog_categorys_articles ON blog_categorys_articles.id_category_article = blog_link_table.id_category_article
    -- LEFT JOIN tags ON articles.id_article = tags.id_article
    WHERE blog_link_table.id_article = '$id_article'";



    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultat;
}



function update_article($id_article, $id_category_article, $title_article, $short_article, $article, $date_article, $commentaire)
{
    global  $connection;
    // Modification de l'article


    $sql =  "UPDATE blog_articles
    SET article= '$article', title_article= '$title_article', short_article= '$short_article', article= '$article', create_article= '$date_article', comment= $commentaire
    WHERE id_article = $id_article";
    $sth = $connection->prepare($sql);
    $sth->execute();

    // modification de liaisons
    $sql =  "UPDATE blog_link_table
    SET id_category_article = '$id_category_article'
    WHERE id_article = $id_article";
    $sth = $connection->prepare($sql);
    $sth->execute();

    // // selection de l'image pour comparaison
    // $sql = "SELECT blog_picture_article FROM blog_articles WHERE id_article=$id_article";
    // $sth = $connection->prepare($sql);
    // $sth->execute();

    // $resultat = $sth->fetch(PDO::FETCH_OBJ);


    // //detruire l'image si différente de la nouvelle image uploadée

    // if ($_FILES["image"]["name"] != "") {


    //     if ($resultat->img != $_FILES["image"]["name"]) {

    //         @unlink("upload/" . $resultat->img);

    //         $filename = img_load($id_article);
    //     }
    // }




    // récupération du nom de l'image;
    // if (isset($filename)) {

    //     // update pour le nom de l'image;
    //     $sql =  "UPDATE blog_articles
    // SET picture_article = '$filename'
    // WHERE id_article=$id_article";
    //     $sth = $connection->prepare($sql);
    //     $sth->execute();
    // }
}

/**
 * permet de passer les produit en actif pour les afficher sur la page produit via la checkbox sur la page admin
 */
function active_article($id_article)
{

    global  $connection;

    $sql =  "UPDATE blog_articles
    SET active_article = 1
    WHERE id_article= '$id_article'";
    $sth = $connection->prepare($sql);
    $sth->execute();
}

function  disabled_article($id_article)
{
    global  $connection;

    $sql =  "UPDATE blog_articles
    SET active_article = 0
    WHERE id_article = '$id_article'";
    $sth = $connection->prepare($sql);
    $sth->execute();
}


/**
 * recupération des images associées aux articles
 */
function unique_picture_article($id_article)
{
    global $connection;

    $sql = "SELECT * FROM blog_picture_article WHERE id_article = '$id_article'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultatPicture = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultatPicture;
}


function add_com($id_article, $commentaire)
{
    global $connection;

    @$prenom = $_SESSION["first_name"];

    $sql_ins = "INSERT INTO  blog_comments(id_article, comment, autor) VALUES (:id_article, :comment, :autor)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':id_article' => $id_article,
        ':comment' => $commentaire,
        ':autor' => "$prenom"

    ));
}

function liste_com($id_article)
{

    global  $connection;
    // req ordonnée pas titre_article
    $sql = "SELECT * FROM blog_comments
    WHERE id_article=$id_article AND active_comment=1 ORDER BY create_comment DESC";


    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}


function complete_list_comment()
{
    global  $connection;

    $sql =  "SELECT *,blog_comments.comment AS comment  FROM blog_comments
    INNER JOIN blog_articles ON blog_articles.id_article = blog_comments.id_article
    WHERE blog_comments.active_comment = 0 ORDER BY create_comment DESC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}


// fonction date qui permet de recuperer le timelaps de phpmyadmin et de le convertir en version francaise
function frdate($date1)
{
    setlocale(LC_TIME, "fr_FR.UTF-8");
    $date2  = strftime("%A %d %b %Y", strtotime($date1));
    return $date2;
}



function valid_com($id_comment)
{

    global  $connection;

    $sql =  "UPDATE blog_comments
    SET active_comment = 1
    WHERE id_comment = $id_comment";
    $sth = $connection->prepare($sql);
    $sth->execute();
}

// supprimer les commentaires de la base de données
function delete_com($id_comment)
{
    global  $connection;

    $sql =  "DELETE FROM commentaires
    WHERE id_comment = $id_comment";
    $sth = $connection->prepare($sql);
    $sth->execute();
}


// Vérification de la validité des informations


function add_info($last_name, $first_name, $connection_identifier, $password, $role)
{

    global $connection;
    $sql = $connection->prepare("
     INSERT INTO users(last_name, first_name, connection_identifier, password, role)
     VALUES (:last_name, :first_name, :connection_identifier, :password, :role)


    ");
    $sql->execute(array(
        ':last_name' => $last_name,
        ':first_name' => $first_name,
        ':connection_identifier' => $connection_identifier,
        ':password' => $password,
        ':role' => $role
    ));
    echo "Entrée ajoutée dans la table";
}
