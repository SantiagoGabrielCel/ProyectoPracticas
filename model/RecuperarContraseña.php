<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require_once("config.php");

$username = '';
$username_err = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
$username = trim($_POST["username"]);
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
         
        $sql = "SELECT ID,contrasenia,Apellido FROM tiendavirtual.usuarios WHERE usuario = '".$username."'";
        $registros = mysqli_query($link,$sql);
		while($reg=mysqli_fetch_array($registros)){
			$ID = $reg['ID'];
			$Apellido = $reg['APELLIDO'];
			echo $reg['contrasenia'];
		}
		$param_password = password_hash($password, PASSWORD_DEFAULT);
		$sql2 = "UPDATE tiendavirtual.usuarios SET contrasenia ='".$param_password."' WHERE ID = ".$ID."";
		$bEjecuta =  mysqli_query($link,$sql2);
		
		try{
				if($bEjecuta){
					
					//echo $Apellido;
					$mail = new PHPMailer(true);
					$mail->SMTPDebug = 2;                      
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
					$mail->addAddress($username,"");     
					
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Recupero de contraseña !';
					$mail->Body    = ' Estimado : '.$Apellido.' Se actualizo su contraseña : ' .$param_password. '  <b>Se genero la contraseña</b>';	
					if(!$mail->Send()) {
					  echo "Error al enviar";
					  var_dump($mail);
					} else {
					  echo "Se envio con Exito";
					  $var1='Exito';
					  echo $var1;
					}
					'<p> Fue un exito </p>';					
					sleep(5);								
					header("location: NuevaContra.php");
				} else{
					echo "Algo salió mal, por favor inténtalo de nuevo.";
				}
			}catch(Exception $ex){
				echo "Error : " . $ex;
			}
	}
	
	
	
    mysqli_close($link);
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olvide mi contraseña</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Olvide Mi contraseña</h2>
        <p>Por favor complete este formulario para recuperar su cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">   
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Recuperar">
            </div>
            <p>¿Recordaste tu contraseña? <a href="../login.html">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>