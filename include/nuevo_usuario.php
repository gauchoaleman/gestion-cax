<?ob_start();
require("connect_db.php");
include("class.phpmailer.php"); 
include("class.smtp.php"); 
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->Username = "gestioncax@gmail.com"; 
$mail->Password = "clubandino";

$mailmiembro=$_GET['email'];
$nombre="Nuevo Miembro";

$body = '
<html>
<head>
	<meta charset="utf-8" />
</head>

<body>
	<h1>Alta en Gestin CAX</h1>
<br>Su mail se ha dado de alta para ser miembro de gestion CAX</br><br>Su clave provisoria de accesso es: <strong>cax1234</strong></br>
	Por favor, ingrese al sistema utilizando su mail y clave provisoria para personalizar su clave de accesso e ingresar sus datos
	<h1>IMPORTANTE</H1> <H2>El primer campo que debe cambiar es el de PASSWORD<br>si no lo hace NO podra realizar ningun cambio</h2><br>
	 <h2>Gestion CAX</h2><br>
	 <h6>Esta comunicación es de carácter confidencial y está amparada por el secreto profesional y se dirige exclusivamente al destinatario indicado. 
	 Todo lector del presente mensaje 
	 quedará debidamente notificado que la divulgación, modificación, reproducción o uso de la información aquí contenida por cualquier otra persona que no sea
	  la indicada como destinataria del mismo, queda terminantemente prohibida. Si Ud. no fuera la persona a la que el presente e-mail está destinado, le agradeceremos 
	  nos lo informe a la brevedad respondiendo este e-mail a la dirección del remitente y elimine de su sistema el mensaje recibido. Muchas gracias
</h6>
</body>
</html>
';



$mail->From = "Alta-usuario@gestioncax"; 
$mail->FromName = "Gestion CAX"; 
$mail->Subject = "Alta de miembro de CAX"; 
$mail->AltBody = ""; 
$mail->MsgHTML($body);
$mail->AddAddress($mailmiembro,$nombre);
$mail->IsHTML(true); 
if(!$mail->Send()) { 
echo "Error: " . $mail->ErrorInfo; 
} else { 
echo "Mensaje enviado correctamente"; 
}

header('Location: ../listadomiembro.php?msg1');
ob_end_flush();?>