<?php
require "header.php";







if (@$_POST["connexion"]) {

    $connection_identifier = htmlspecialchars($_POST["connection_identifier"]);
    $password = htmlspecialchars($_POST["password"]);

    verif_login($connection_identifier, $password);
}

?>



<div class="container">
    <h1>Connexion</h1>

    <form class="form-login" action="login.php" method="post">

        <label for="">Email</label><br>
        <input type="text" class="form-control" name="connection_identifier" value="" required><br>

        <label for="">Votre Mot de passe</label><br>
        <input type="password" class="form-control" name="password" value="" required><br><br>

        <input type="submit" class="btn btn-info" name="connexion" value="Se connecter"><br>

        <label for="">Pas de compte ?</label><br>

        <a href="user.php" class="btn btn-info">Créer un compte</a>

        <?php if (isset($_GET["identification"])) { ?>
        <div>Vos identifiants ne sont pas valides</div>
        <?php } ?>

    </form>
    <a href="kill.php">Session</a>

        </div>
    <?php
    include "footer.php";
    ?>