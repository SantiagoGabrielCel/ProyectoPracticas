<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'model/PHPMailer/Exception.php';
require 'model/PHPMailer/PHPMailer.php';
require 'model/PHPMailer/SMTP.php';
require_once("model/config.php");

$usuario=$_POST["usuario"];
$contraseña=$_POST["contraseña"]; 

$conexion=mysqli_connect("localhost:3307","root","root","tiendavirtual");
if (mysqli_connect_errno()) {
	echo "error al conectar a MYSQL";
	exit();
}



$rs = $conexion->query( "CALL sp_in_login('".$usuario."', '".$contraseña."', @f, @r)" );
$rs = $conexion->query( 'SELECT  @f, @r' );
$row = mysqli_fetch_assoc($rs);
$rol = $row['@r'];
$rs1 = $conexion->query( "CALL sp_generacodigoMFA(@Codigo)" );
$rs1 = $conexion->query( 'SELECT  @Codigo');
$row2 = mysqli_fetch_assoc($rs1);
$Codigo = $row2['@Codigo'];

if ($row['@f'] != null and $row['@r'] != null) {
		try{
				
					
					$mail = new PHPMailer(true);
					$mail->SMTPDebug = 0;                      
					$mail->isSMTP();                                            
					$mail->Host       = 'smtp.gmail.com'; 
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'appracticas312@gmail.com';                     //SMTP username
					$mail->Password   = 'Beltran1234';
					$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
					$mail->Port       = 587;
					$mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);    
					//Recipients
					$mail->setFrom('appracticas312@gmail.com', 'Admin');
					$mail->addAddress($usuario);     
					
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Bienvenido !';
					$mail->Body    = '<h1>Bienvenido!</h1> <br> su codigo es : ' .$Codigo. ' </br>  <b>Ingrese su codigo para verificar. </b>';	
					if(!$mail->Send()) {
					  echo "Error al enviar";
					  var_dump($mail);
					} else {
					 
					}
																		
				} 
			catch(Exception $ex){
				echo "Error : " . $ex;
			}
		  echo $rol;
      } else {
         echo "1";
      }
		
        





?>
