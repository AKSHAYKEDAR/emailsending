<?php
$errors="";
$myemail="akshaykedar585@gmail.com";//<—–PutYouremailaddresshere.
if(empty($_POST["name"])||
empty($_POST["email"])||
empty($_POST["message"]))
{
$errors.="\nError:all fields are required";
}
$name=$_POST["name"];
$email_address=$_POST["email"];
$message=$_POST["message"];
if(!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email_address))
{
$errors.="\nError:Invalid email address";
}
if(empty($errors))
{
$to=$myemail;
$email_subject="Contact form submission:$name";
$email_body="You have received a new message.".
"Herearethedetails:\nName:$name\n".
"Email:$email_address\nMessage\n$message";
$headers="From:$myemail\n";
$headers.="Reply-To:$email_address";
mail($to,$email_subject,$email_body,$headers);
//redirecttothe"thankyou"page
header("Location:contact-form-thank-you.html");
}
?>