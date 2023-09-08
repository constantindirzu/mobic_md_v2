<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);
    $mail ->CharSet = 'UTF-8';
    $mail ->setLanguage('en', 'phpmailer/language/');
    $mail ->isHtml(true);
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    //$mail->Host = "smtp.example.com";
    $mail->SMTPSecure = 'TLS'; 
    $mail->Port       = '587'; 

    $mail->Username   = 'constantindirzu@gmail.com';    //SMTP username
    $mail->Password   = 'mheiotoytlydpbli';   

    //from
    $mail->setFrom($email, $name);
    //to
    $mail->addAddress('constantindirzu@gmail.com', 'Mobi-C Moldova');     
    
    $mail->Subject = $subject;


    $body  = '<h1> Message receipt from User </h1>';
    $body .= "<p>Name:<strong>".$name."</strong></p>";
    $body .= "<p>Email:<strong>".$email."</strong></p>";
    //$message .= "<p>Phone:<strong>".$Phone."</strong></p>";
    $body .= "<h2>Message:</h2>";
    $body .= "<p>".$message."</p>";

    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
   
    //$mail->smtpClose();

    //echo "email send";

?>