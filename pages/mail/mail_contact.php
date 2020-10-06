<?php 
$email =$_GET["email"]; 
$message = $_GET["msg"]
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail de contact</title>
</head>
<body>
    Votre email est : <?php echo $email ?><br>
    Votre message est : <?php echo $message ?>

</body>
</html>