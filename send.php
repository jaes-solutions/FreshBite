<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$name    = $_POST["name"];
$email   = $_POST["email"];
$phone   = $_POST["phone"];
$message = $_POST["message"];

if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo "Please fill in all fields.";
    exit;
}

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "sangeethaluke@gmail.com";
$mail->Password = "llljengjjnsfvpkj";

$mail->setFrom($email, $name);
$mail->addAddress("sangeethaluke@gmail.com", "sangeetha");

$mail->Subject = "New Contact Message from FreshBite";
$mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";

$mail->send();

header("Location: sent.html");
exit;
