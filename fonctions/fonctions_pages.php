<?php
// recup liste titres actif des pages
function liste_pages()
{
    global  $connection;
    // req ordonnée pas titre_page
    $sql = "SELECT * FROM pages 
    ORDER BY title_page ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}


// recup liste titres actif des pages
function liste_pages_achatRaiso()
{
    global  $connection;
    // req ordonnée pas titre_page
    $sql = "SELECT * FROM pages 
  INNER JOIN page_contents ON page_contents.id_page = pages.id_page WHERE pages.id_page = 3
    ORDER BY title_page ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}

// recup liste titres actif des pages
function liste_pages_venteDirect()
{
    global  $connection;
    // req ordonnée pas titre_page
    $sql = "SELECT * FROM pages 
  INNER JOIN page_contents ON page_contents.id_page = pages.id_page WHERE pages.id_page = 4
    ORDER BY title_page ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}
// recup liste pages actives pour emplettes solidaires
function liste_pages_emplettes()
{
    global  $connection;
    // req ordonnée pas titre_article
    $sql = "SELECT * FROM pages 
    INNER JOIN category_pages ON category_pages.id_category_page = pages.id_category_page WHERE category_pages.id_category_page = 4
    ORDER BY title_page ASC";
    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);

    return $resultat;
}

// permet la récuparartion des pages lié à la categorie
function recup_pages_emplettes_by_id($id_category_page)
{
    global  $connection;

    $sql =  "SELECT *  FROM pages
    INNER JOIN category_pages ON category_pages.id_category_page = pages.id_category_page
    
    WHERE category_pages.id_category_page= '$id_category_page'";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}

// permet la récuparartion des pages lié à la categorie et aux contenus
function recup_pages_emplettes()
{
    global  $connection;

    $sql =  "SELECT *  FROM pages
    INNER JOIN category_pages ON category_pages.id_category_page = pages.id_category_page
    INNER JOIN page_contents ON page_contents.id_page = pages.id_page
    WHERE pages.id_category_page= category_pages.id_category_page";

    $sth = $connection->prepare($sql);
    $sth->execute();

    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}
// permet la récuparartion d'une page unique
function single_page($id_page)
{

    global $connection;

    $sql = "SELECT * FROM pages
    INNER JOIN category_pages ON category_pages.id_category_page = pages.id_category_page
    WHERE pages.id_page =  '$id_page'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_OBJ);
    return $resultat;
}

// permet l'affichage des presentations dans la page
function presentation_page($id_page)
{
    global $connection;

    $sql = "SELECT * FROM presentation_contents WHERE id_page = '$id_page'";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
    return $resultat;
}

// permet d'ajouter une nouvelle page
function insert_page($title_page, $url_page, $number_content, $id_category_page)
{

    global $connection;
    // insert dans la table articles
    $sql_ins = "INSERT INTO pages(title_page, url_page, id_category_page) VALUES (:title_page, :url_page, :id_category_page)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':title_page' => $title_page,
        ':url_page' => $url_page,
        ':id_category_page' => $id_category_page

    ));
}

// permet de modifier une page
function update_page($url_page, $title_page, $id_category_page, $id_page)
{

    global  $connection;

    $sql =  "UPDATE pages
    SET url_page= '$url_page', title_page= '$title_page' WHERE id_page= $id_page";
    $sth = $connection->prepare($sql);
    $sth->execute();
}

// boucle permettant d'afficher le nombre d'input et textarea vide en selectionnnant un titre
function boucle_for($number_content)
{ ?>
    <div class="form-row">
        <?php for ($i = 1; $i <= $number_content; $i++) { ?>

            <div class="form-group col-md-6">
                <label class="formulaire" for="">Titre de l'événement*</label><br>
                <input type="text" class="form-control title_presentation" name="title_presentation[]" value=""><br>
                <label class="formulaire" for="">Description de l'événement*</label><br>
                <textarea name="presentation_page[]" id="editor" class="form-control" cols="30" rows="10"></textarea><br>


                <input class="form-control" type="date" name="date_start[]"><br>


                <input class="form-control" type="date" name="date_end[]"><br>


                <input type="hidden" name="ordre[]" value="<?php echo $i ?>">
            </div>

            <br><br>
        <?php } ?>
    </div>
<?php }

// boucle permettant d'afficher le nombre d'input et textarea avec les info de la base en selectionnnant un titre
function boucle_foreach($number_content)
{
    $i = 1 ?>
    <div class="form-row">
        <?php foreach ($number_content as $row) { ?>

            <div class="form-group col-md-6">
                <label class="formulaire" for="">Titre de l'événement*</label><br>
                <input type="text" class="form-control title_presentation" name="title_presentation[]" value="<?php echo $row->title_presentation ?>"><br>
                <label class="formulaire" for="">Description de l'événement*</label><br>
                <textarea name="presentation_page[]" id="editor" class="form-control" cols="30" rows="10"><?php echo $row->presentation_content ?></textarea><br>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" type="date" name="date_start[]" value="<?php echo $row->date_start ?>"><br>
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" type="date" name="date_end[]" value="<?php echo $row->date_end ?>"><br>
                    </div>
                </div>
                <input type="hidden" name="id_content[]" value="<?php echo $row->id_presentation ?>">
                <input type="hidden" name="ordre[]" value="<?php echo $i ?>">
            </div>

            <br><br>
        <?php $i++;
        } ?>
    </div>
<?php }

// permet l'insertion de contenu dans la table page_contents
function insert_content($title_content, $date_start, $date_end, $price_activity, $id_page)
{



    global $connection;
    // insert dans la table page_content
    $sql_ins = "INSERT INTO page_contents(title_content, date_start, date_end, price_activity, id_page) VALUES (:title_content, :date_start, :date_end, :price_activity, :id_page)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':title_content' => $title_content,
        ':date_start' => $date_start,
        ':date_end' => $date_end,
        ':price_activity' => $price_activity,
        ':id_page' => $id_page

    ));

    //  $id_content = $connection->lastInsertId();
}


// permet l'insertion dans la table presentation_content
function insert_description($title_presentation, $presentation_page, $date_start, $date_end, $order_content, $id_page, $id_presentation)
{

    global $connection;
    $i = 0;
    //  var_dump($presentation_page);
    //die();




    foreach ($presentation_page as $key => $row) {

        if ($id_presentation) {

            if ($date_start[$i] == '') {
                $date_start[$i] =  NULL;
                $date_end[$i] =  NULL;
            }


            $sql =  "UPDATE presentation_contents
    SET title_presentation = '$title_presentation[$i]', presentation_content = '$presentation_page[$i]', date_start = '$date_start[$i]', date_end = '$date_end[$i]'
    WHERE id_presentation = $id_presentation[$i]";
            $sth = $connection->prepare($sql);
            $sth->execute();

            // var_dump($presentation_page);
            //die();

        } else {


            $sql_ins = "INSERT INTO presentation_contents(title_presentation, presentation_content, date_start, date_end, order_content, id_page) VALUES (:title_presentation, :presentation_content, :date_start, :date_end, :order_content, :id_page)";

            $sth = $connection->prepare($sql_ins);
            $sth->execute(array(
                ':title_presentation' => $title_presentation[$i],
                ':presentation_content' => $presentation_page[$i],
                ':date_start' => $date_start[$i],
                ':date_end' => $date_end[$i],
                ':order_content' => $order_content[$i],
                ':id_page' => $id_page

            ));
        }

        $i++;
    }
}
