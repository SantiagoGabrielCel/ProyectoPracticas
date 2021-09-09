<?php

require_once("config.php");

$username = '';
$username_err = '';
$PassConfirmar= '';
$contraVieja='';
$ConfirmadaContra='';
$password = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){
		$contraVieja =trim($_POST["passold"]);
        $password = trim($_POST["passwordNew"]);
		$ConfirmadaContra= trim($_POST["passwordCONF"]);
		echo $$ConfirmadaContra;
		$sql2 = "UPDATE tiendavirtual.usuarios SET contrasenia ='".$ConfirmadaContra."' WHERE contrasenia = '".$contraVieja."'";
		$bEjecuta =  mysqli_query($link,$sql2);
		if($bEjecuta){
			echo "HOLA";
			echo $sql2;
			}
			header("location: ../login.html");
		
	}
		
    mysqli_close($link);
	
        
    if(empty(trim($_POST["passwordCONF"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["passwordCONF"]);
        if(empty($password_err) && ($passwordNew != $passwordCONF)){
            $confirm_password_err = "No coincide la contraseña.";
        }
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
        <h2>Ingrese nueva contraseña</h2>
        <p>Por favor complete este formulario para recuperar su cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">   
            <div class="form-group <?php echo (!empty($passOLD_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña Vieja</label>
                <input type="password" name="passold" class="form-control" value="<?php echo $passOLD; ?>">
                <span class="help-block"><?php echo $passOLD_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="passwordNew" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($PassConfirmar)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="passwordCONF" class="form-control" value="<?php echo $PassConfirmar; ?>">
                <span class="help-block"><?php echo $PassConfirmar_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Recuperar">
            </div>
            <p>¿Recordaste tu contraseña? <a href="../login.html">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>