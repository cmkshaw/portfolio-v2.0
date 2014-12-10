<?php

//Include the class
include("mailsend.php");

//Post the values from the contact form to the values of the class
$from = $_POST['email'];
$to = "info@caroshaw.com";
$subject = $_POST['name'];
$body = $_POST['message'];

//send the mail
mail_send($from,$to,$subject,$body);

?>