<?php

/**
 * Permet de changer le mot de passe
 */
function update_password($old_password, $new_password, $id_user)
{
    global  $connection;

    // Je hash le nouveau mot de passe pour qu'il soit crypter dans la base de donnée
    $crypt_pass = decrypt($new_password);

    //Selection du champ password de la table user je cible la requête sur id_user avec where 
    $sql = "SELECT password FROM users
    WHERE users.id_user = $id_user";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_OBJ);


    // si l'ancien mot de passe correspond au cryptage dans la base de donnée
    if (password_verify($old_password, $resultat->password)) {

        //Alors je met a jour dans la table user le mot de passe et je cible l'id user avec where
        $sql =  "UPDATE users
    SET  password = '$crypt_pass'
    WHERE id_user = $id_user";
        $sth = $connection->prepare($sql);
        $sth->execute();
    } else {
        echo ("mot de passe incorrect");
    }
}


// fonction mot de passe oublié 
function motdepasse_oublie($adresse_mail)
{
    global $connection;


    $sql =
        "SELECT *
FROM users
WHERE connection_identifier = :connection_identifier";
    $sth = $connection->prepare($sql);
    $sth->execute(array(
        ':connection_identifier' => $adresse_mail
    ));

    $resultat = $sth->fetch(PDO::FETCH_OBJ);

    return @$resultat->connection_identifier;
}


// fonction pour récupérer l'id de l'utilisateur qui a oublié son mot de passe
function recup_id_pass_forgot($adresse_mail)
{
    global  $connection;
    $sql =
        "SELECT * FROM users 
    WHERE connection_identifier = :connection_identifier";
    $sth = $connection->prepare($sql);
    $sth->execute(array(
        ':connection_identifier' => $adresse_mail

    ));
    $resultat = $sth->fetch(PDO::FETCH_OBJ);
    return @$resultat->id_user;
}

// fonction de vérification de l'id 
function verification_id($var2)
{

    global $connection;
    $sql = "SELECT *
    FROM users
    WHERE id_user = $var2";
    $sth = $connection->prepare($sql);
    $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_OBJ);

    return $resultat;
    // if ($var2 == isset($resultat->id_user)) {
    //     echo 'ok id existant';
    // } else {
    //     echo "id n'existent pas";
    // }

    //var_dump($resultat);
}

// fonction permettant la modification du mot de passe
function modifier_motdepasse($id_user, $mot_de_passe1)
{

    $cryptage =  decrypt($mot_de_passe1);

    global $connection;
    $sql = "UPDATE users
    SET password = '$cryptage'
    WHERE id_user = $id_user";
    $sth = $connection->prepare($sql);
    $sth->execute();

    //var_dump($id_user);
}
?>

<script>
    /* Password strength indicator */
    function passwordStrength(password) {

        var msg = ['not acceptable', 'very weak', 'weak', 'standard', 'looks good', 'yeahhh, strong mate.'];

        var desc = ['0%', '20%', '40%', '60%', '80%', '100%'];

        var descClass = ['', 'bg-danger', 'bg-danger', 'bg-warning', 'bg-success', 'bg-success'];

        var score = 0;

        // if password bigger than 6 give 1 point
        if (password.length > 6) score++;

        // if password has both lower and uppercase characters give 1 point	
        if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score++;

        // if password has at least one number give 1 point
        if (password.match(/d+/)) score++;

        // if password has at least one special caracther give 1 point
        if (password.match(/.[!,+,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) score++;

        // if password bigger than 12 give another 1 point
        if (password.length > 10) score++;

        // Display indicator graphic
        $(".jak_pstrength").removeClass(descClass[score - 1]).addClass(descClass[score]).css("width", desc[score]);

        // Display indicator text
        $("#jak_pstrength_text").html(msg[score]);

        // Output the score to the console log, can be removed when used live.
        console.log(desc[score]);
    }
</script>