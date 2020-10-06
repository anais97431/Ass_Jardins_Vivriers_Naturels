
<?php

function captcha(){

$secretKey = '6Ld7vdYUAAAAABYdUk10ELBMiBRgMjebpfM3rQvD';
            $captcha   = $_POST['g-recaptcha-response'];
            

            // if(empty($captcha)){

            //     $_SESSION["captcha_error"] = "Merci de valider la captcha";
            //     header("location:contact.php?captcha=error");

            // } else {

            $ip             = $_SERVER['REMOTE_ADDR'];
            $response       = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
            $responseKeys   = json_decode($response,true);


            if(!$responseKeys["success"]){
                
                
                return false;
                
            }else{
                return true;
            }
}

?>