<?php
// Check for empty fields
if(empty($_POST['Nombre']) || empty($_POST['Correo Electrónico']) || empty($_POST['Teléfono']) || empty($_POST['Comentario']) || !filter_var($_POST['Correo Electrónico'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$Name = strip_tags(htmlspecialchars($_POST['Nombre']));
$Email = strip_tags(htmlspecialchars($_POST['Correo Electrónico']));
$Phone = strip_tags(htmlspecialchars($_POST['Teléfono']));
$Message = strip_tags(htmlspecialchars($_POST['Comentario']));

// Create the email and send the message
$to = "yourname@yourdomain.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form:  $Name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nNombre: $Name\n\nCorreoElectronico: $Email\n\nTelefono: $Phone\n\nComentario:\n$Message";
$header = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $Email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
