<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require_once("config.php");
//$var = Db::conectar();

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$Nombre = $Nombre_err =  "";
$Apellido = $Apellido_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
         
        $sql = "SELECT ID FROM tiendavirtual.usuarios WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = trim($_POST["username"]);
            $param_Nombre = trim($_POST["Nombre"]);
            $param_Apellido = trim($_POST["Apellido"]);
			
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya fue tomado.";
                } else{
                    $username = trim($_POST["username"]);
					
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        
        mysqli_stmt_close($stmt);
    }
    
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
   
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        
        $sql = "INSERT INTO tiendavirtual.usuarios (Nombre,apellido,usuario,contrasenia,Fecha_Nacimiento,Fecha_Registro,Habilitado,Fallido,ID_ROL) 		VALUES (?,?,?,?,'2000-11-17',NOW(),1,0,4)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt,"ssss",$param_Nombre,$param_Apellido ,$param_username, $param_password);
            
			$param_Nombre = trim($_POST["Nombre"]);			
			$param_Apellido = trim($_POST["Apellido"]);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            //echo $param_password;
            try{
				if(mysqli_stmt_execute($stmt)){
					
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
					$mail->addAddress($param_username, $param_Apellido);     
					
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Bienvenido !';
					$mail->Body    = 'Bienvenido : ' . $Apellido . '  <b>Su registro fue exitoso</b>';	
					if(!$mail->Send()) {
					  echo "Error al enviar";
					  var_dump($mail);
					} else {
					  echo "Se envio con Exito";
					  $var1='Exito';
					  echo $var1;
					}
													
					//header("location: ../login.html");
				} else{
					echo "Algo salió mal, por favor inténtalo de nuevo.";
				}
			}catch(Exception $ex){
				echo "Error : " . $ex;
			}
        }
         
        
        mysqli_stmt_close($stmt);
    }    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($Nombre_err)) ? 'has-error' : ''; ?>">
                <label>Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre; ?>">
                <span class="help-block"><?php echo $Nombre_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($Apellido_err)) ? 'has-error' : ''; ?>">
                <label>Apellido</label>
                <input type="text" name="Apellido" class="form-control" value="<?php echo $Apellido; ?>">
                <span class="help-block"><?php echo $Apellido_err; ?></span>
            </div>     
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="../login.html">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>