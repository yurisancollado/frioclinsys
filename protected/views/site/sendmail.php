<?php
$to      = "frioclin@gmail.com";
$subject = $_POST['nombre'].' contacto Frioclin';
$message = $_POST['mens']. ' Telefono: '.$_POST['tlf'].' Email: '.$_POST['email'];
$headers = 'From:'.$_POST['email']. "\r\n" .
    'Reply-To: '.$_POST['email']. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
header('Location: contacto.html');
?>
<?php/*
$to      = "crtx000@gmail.com";
$subject = $_POST['nombre'].' contacto Frioclin';
$message = '<html>
<head>
  <title>'.$_POST['nombre'].' nos ha contactado a través de frioclin.com</title>
</head>
<body>
  <p>El mensaje enviado por '.$_POST['nombre'].' fué el siguiente:</p>
	<p>"'.$_POST['mens'].'"</p>
 <p>Su información de contacto es: <br/>Teléfono:'.$_POST['tlf'].'<br/>Correo Electrónico:'.$_POST['email'].'</p>
</body>
</html>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers = 'From:'.$_POST['email']. "\r\n" .
    'Reply-To: '.$_POST['email']. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);*/
?>