<?php
require "header.php";
require "../fonctions/fonctions_facture.php";


@$id_user = htmlspecialchars($_SESSION["id_user"]);


@$update_password = htmlspecialchars($_POST["update_password"]);
@$update_user = htmlspecialchars($_POST["update_compte"]);
@$old_password = htmlspecialchars($_POST["old_password"]);
@$new_password = htmlspecialchars($_POST["new_password"]);
@$new_password2 = htmlspecialchars($_POST["new_password2"]);
@$name = htmlspecialchars($_POST["prenom2"]);
@$last_name = htmlspecialchars($_POST["nom2"]);
@$adress = htmlspecialchars($_POST["adresse2"]);
@$login = htmlspecialchars($_POST["login2"]);
@$id_shop_payment = htmlspecialchars($_POST["id_payment"]);


if ($update_user) {
    update_user($name, $last_name, $adress, $login, $id_user);
}

if ($update_password) {

    if ($new_password == $new_password2) {

        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $new_password)) {
            sleep(1);
            //echo 'ok mdp modifié';
            update_password($old_password, $new_password, $id_user);
            header('location:compte.php?accountnewpwd-success');
            //ob_start();
            exit();
        } else {
            header('location:compte.php?erreuraccount-securite');
        }
    } else {
        header('location:compte.php?erreuraccount-password');
    }
}

$select_user = recup_user($id_user);
$select_payment = select_id_payment($id_user);
@$recup_product = recup_all_product($id_user);

// var_dump($select_user);
@$total = 0;
?>
<div class="row compte">
    <!-- <div class="row compte"> -->

    <div class="col-md-3 offset-1 form1">





        <label for="" class="label1_entete"> Votre compte : </label>


        <form class="form-login">

            <label for="" class="label1">Nom : </label><br>
            <input type="text" class="form-control" name="nom" value="<?php echo $select_user->last_name ?>" disabled><br>

            <label for="" class="label1">Prénom : </label><br>
            <input type="text" class="form-control" name="prenom" value="<?php echo $select_user->first_name ?>" disabled><br>


            <label for="" class="label1">Adresse Mail : </label><br>
            <input type="text" class="form-control" name="login" value="<?php echo $select_user->connection_identifier ?>" disabled><br>
        </form>
    </div>



    <div class="col-md-3 offset-1 form2">

        <label for="" class="label2_entete"> Modification de votre compte :</label>

        <form class="form-login" action="compte.php" method="post">

            <label for="" class="label2">Nom : </label><br>
            <input type=" text" class="form-control input" name="nom2" value="<?php echo $select_user->last_name ?>"><br>

            <label for="" class="label2">Prénom :</label><br>
            <input type=" text" class="form-control input" name="prenom2" value="<?php echo $select_user->first_name ?>"><br>

            <label for="" class="label2">Adresse Mail :</label><br>
            <input type=" text" class="form-control input" name="login2" value="<?php echo $select_user->connection_identifier ?>"><br>

            <input class="button_compte" type="submit" class="btn btn-info" name="update_compte" value="Modifier cordonnées">
        </form>

    </div>


    <div class="col-md-3 offset-1 form3">





        <label for="" class="label1_entete"> Mot de passe : </label>
        <form class="form-login" action="compte.php" method="post">




            <?php if (isset($_GET["accountnewpwd-success"])) { ?>
                <div class="alerte-accound-pwd">Votre mot de passe a bien été modifier !</div>

            <?php } ?>



            <?php if (isset($_GET["erreuraccount-securite"])) { ?>
                <div class="alerte-password-securite">Niveau de sécurité trop faible</div>
            <?php } ?>


            <?php if (isset($_GET["erreuraccount-password"])) { ?>
                <div class="alerte-password-false">Vos mots de passe ne correspondent pas, merci de retaper votre mot de passe</div>
            <?php } ?>
            <label for="" class="label1">Ancien mot de passe : </label><br>
            <input type="password" class="form-control" name="old_password" value="" required><br>

            <label for="" class="label1">Nouveau mot de passe : </label><br>
            <input type="password" class="form-control password" name="new_password" value="" ata-toggle="tooltip" title="minimum 8 caractères avec au moins 1 majuscule 1 minuscule 1 caractère spécial et 1 chiffre" data-placement="right" aria-describedby="inputGroupPrepend3" required pattern=".{8,}"><br>

            <label for="" class="label1">Retapez votre mot de passe : </label><br>
            <input type="password" class="form-control" name="new_password2" value="" required><br>


            <h5>Sécurité mot de passe : </h5>
            <div class="progress progress-striped active">
                <div id="" class="progress-bar jak_pstrength" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>

            </div><br>
            <p id="jak_pstrength_text" class="text-center"></p>
            <br>
            <input class="button_compte" type="submit" name="update_password" value="Modifier mot de passe">

        </form>
    </div>
    <!-- </div> -->
</div>

<div class="container">
    <div class="row ligne_facture">
        <h1>Vos factures : </h1>
        <table class="table">
            <thead class="entete_facture">
                <tr>
                    <th>Date</th>
                    <th>Numéro</th>
                    <th>Détail</th>

                </tr>
            </thead>


            <tbody class="corps_facture">
                <!-- La variable select_payment récupére la fonction select_id_payment($id_user) déclaré plus haut -->
                <!-- Le foreach permet de faire tourner la focntion afin de récupérer les informations de la table -->
                <?php foreach ($select_payment as $row1) { ?>


                    <!-- Je récupère ensuite en ciblant $row1 ce qui permet de récupérer les infos sur la ligne -->
                    <form class="form-tableau" action="facture.php" method="post">

                        <tr>
                            <td><?php echo " " . frdate($row1->date_payment); ?></td>

                            <td><?php echo $row1->number_ordered ?></td>

                            <?php $id_user_crypt = aesEncrypt($id_user) ?>

                            <td><a class="eye" href="facture.php?id_payment=<?php echo $row1->id_shop_payment ?>&id<?php echo $id_user_crypt ?>" value=""><i class="far fa-eye"></i></a></td>






                        </tr>

                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "footer.php";
?>