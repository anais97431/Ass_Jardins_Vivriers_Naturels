<?php 
$id_user = $_GET['newpwd-id'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail de contact</title>
</head>
<body>

<h1>Bonjour,</h1>
  <p> Cliquez sur ce lien pour modifier votre mot de passe : https://www.projetfinalelgueta.fr/pages/index.php?newpwd-id=<?php echo $id_user; ?><br></p>
    

</body>
</html>