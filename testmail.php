<?php
$to = 'bsef15m527@pucit.edu.pk';
$subject = 'My subject';
$message = 'Hi you, Are you ok?';
$from = 'aman.ullah@coeus-solutions.de';
$msg = mail($to, $subject, $message,$from);
// Sending email
if($msg){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>

