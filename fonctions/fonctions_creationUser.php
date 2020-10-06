<?php
// ob_start();

// Fonction pour crypter un mot de passe
function decrypt($passe)
{
    $pass_hash = password_hash($passe, PASSWORD_DEFAULT);
    return $pass_hash;
}
// Fonction pour détecter si une adresse mail a déja été insérer dans la base.
function doublon_user($connection_identifier)
{

    global $connection;

    $sql = "SELECT * FROM users WHERE connection_identifier = :connection_identifier";
    $sth = $connection->prepare($sql);
    $sth->execute(array(
        ':connection_identifier' => $connection_identifier
    ));
    $resultat = $sth->fetch(PDO::FETCH_OBJ);

    return $resultat->connection_identifier;
}


// Fonction permettant l'ajout d'utilisateur dans la base

function  insert_user($last_name, $first_name, $connection_identifier, $passe_hash)
{

    global $connection;

    $sql_ins = "INSERT INTO  users(last_name, first_name, connection_identifier, password) VALUES (:last_name, :first_name, :connection_identifier, :password)";

    $sth = $connection->prepare($sql_ins);
    $sth->execute(array(
        ':last_name' => $last_name,
        ':first_name' => $first_name,
        ':connection_identifier' => $connection_identifier,
        ':password' => $passe_hash

    ));
}

// fonction permettent la verification du login et du mot de passe au moment de la connexion
// redirection vers les pages admin ou index en fonction du role
function verif_login($connection_identifier, $password)
{

    //var_dump($connection_identifier);


    global $connection;

    // SELECT permet de recupérer le login ainsi que le passe lié

    $sqlSel = "SELECT * FROM users WHERE connection_identifier = ?";
    // var_dump($sql);

    $sth = $connection->prepare($sqlSel);

    $sth->execute(array(
        $connection_identifier
    ));
    $compt = $sth->rowCount();

    if ($compt == 0) {
        echo "<h3>" . "Votre login n'est pas enregistré sur ce site !" . "<br>";
        echo "<h3>" . "Veuillez créer un compte pour vous connecter. ";

        header('Location:index?message=3');

        exit();
    }

    $resultat = $sth->fetch(PDO::FETCH_OBJ);

    // var_dump($resultat);
    // var_dump($resultat->password);


    // vérification du mot de passe taper et du passe dans la base de donnée
    //si le login taper dans le formulaire est égale au login de la base de donnée
    if ($connection_identifier == $resultat->connection_identifier) {
        //si le mot de passe taper correspond au mot de passe hacher dans la base de donnée
        if (password_verify($password, $resultat->password)) {

            // on met un message  mot de passe correct
            echo "Mot de passe correct";
            //si le role de l'utilisateur est égale à 5 
            //on lui précise que les identifiant de session corresponde au identifiant de la bese de donnée
            if ($resultat->role == 5) {
                $_SESSION["id_user"] = $resultat->id_user;
                $_SESSION["role"] = $resultat->role;
                $_SESSION["last_name"] = $resultat->last_name;
                $_SESSION["first_name"] = $resultat->first_name;
                // on redirige vers la page admin car c'est un administrateur
                header('Location:admin');
                // on arrete le script
                exit();

                // sinon on precise que les idenfiants de session sont toujours égale aux resultat de la base de donnée 
                //mais on redirige vers la page accueil car c'est un utlisateur role = 1 
            } else {
                $_SESSION["id_user"] = $resultat->id_user;
                $_SESSION["role"] = $resultat->role;
                $_SESSION["last_name"] = $resultat->last_name;
                $_SESSION["first_name"] = $resultat->first_name;

                header('Location:index');
                exit(); //on stop le script
            }
        } else {
            // si tout ceci ne s'est pas exécuté on met un message vos identifiants sont incorrect
            // le echo ne se verra pas cette partie est lié a l'erreur du mot de passe 
            echo "Mot de passe incorrect";
            // on sera redirigé vers la page index avec message=1 qui mettra un message 
            // vos identifiants sont incorrects sur la modale
            header('Location: index?message=1');
            exit(); // stop le script
        }
    } else {
        // si tout l'ensemble ne s'est pas exécuté on met un message vos identifiants sont incorrect
        // les echo ne se verra pas cette partie est lié a l'erreur du login 
        echo "Mot de passe incorrect";
        echo "Votre login est faux.";
        // on sera redirigé vers la page index avec message=2 qui mettra un message 
        // vos identifiants sont incorrects sur la modale
        header('Location: index?message=2');
        exit();
    }
}
// si resultat est faux on redirige vers la page de login
// si le role est egale à 5 on redirige vers la page de admin
