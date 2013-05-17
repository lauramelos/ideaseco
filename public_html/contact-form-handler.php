<?php 
$errors = '';
$myemail = 'ventas@ideasecopublicidad.com.ar';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['phone'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: todos los campos son requeridos";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: correo electronico invalido";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Formulario de contacto Ideas ECO: $name";
	$email_body = "Has recibido un nuevo mensaje. ".
	" Aqui estan los detalles:\n Nombre: $name \n Email: $email_address \n Mensaje \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: gracias.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>
