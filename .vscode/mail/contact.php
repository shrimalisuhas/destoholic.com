<?php
if(empty($_POST['name']) || empty($_POST['Countries']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_Countries = strip_tags(htmlspecialchars($_POST['Countries']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "info@destoholic.com"; // Change this email to your //
$Countries = "$m_Countries:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nCountries: $m_Countries\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $Countries, $body, $header))
  http_response_code(500);
?>
