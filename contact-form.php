<?php
$errors = '';
$myemail = 'stephen.coulter@isarc.co.uk';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
    empty($_POST['email']) ||
    empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $name \n ".
        "Email: $email_address\n Message: \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
    header('Location: help.html');
}

$message = "Thank you for your interest. We will get back to you as soon as possible.<br />Sincerely,<br />Stephen Coulter";
$subject = "Confirmation";

$headers2 = "From: $myemail\r\n";
$headers2 .= "Content-type:  text/html\r\n";
mail($email_address, $subject, $message, $headers2);
?>