<?php

require "header.php";


if ($_POST) {

    @$last_name = htmlspecialchars($_POST["last_name"]);
    @$first_name = htmlspecialchars($_POST["first_name"]);
    @$connection_identifier = htmlspecialchars($_POST["connection_identifier"]);
    @$password = htmlspecialchars($_POST["password"]);
    @$connexion = htmlspecialchars($_POST["creer"]);
    @$passe_hash =  decrypt($password);
    @$doublon = doublon_user($connection_identifier);

    if ($connexion) {

        if ($connection_identifier == $doublon) {
            echo "Utilisateur déjà existant !";
        } else {
            insert_user($last_name, $first_name, $connection_identifier, $passe_hash);
            echo "Utilisateur enregistré !";
        }
    }
}

?>



<div class="container">
    <h1>Créer votre compte</h1>

    <form class="form-login" action="user.php" method="post">

        <label for="">Votre Nom</label><br>
        <input type="text" class="form-control" name="last_name" value="" required><br>

        <label for="">Votre Prénom</label><br>
        <input type="text" class="form-control" name="first_name" value="" required><br>

        <label for="">Adresse Mail</label><br>
        <input type="text" class="form-control" name="connection_identifier" value="" required><br>

        <label for="">Votre Mot de passe</label><br>
        <input type="password" class="form-control" name="password" value="" required><br><br>

        <input type="submit" class="btn btn-info" name="creer" value="Créer mon compte">


    </form>
</div>
<a href="kill.php">Session</a>
<?php
include "footer.php";
?>