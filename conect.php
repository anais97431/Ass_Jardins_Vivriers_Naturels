<?php
// connexion à la base de donnée
define("PDO_HOST", "localhost");
define("PDO_DBBASE", "base_jardin_vivrier");
define("PDO_USER", "root");
define("PDO_PW", "root");
try {
    $connection = new PDO(
        "mysql:host=" . PDO_HOST . ";" .
            "dbname=" . PDO_DBBASE,
        PDO_USER,
        PDO_PW,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
