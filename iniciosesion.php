<?php
$usuario=$_POST["usuario"];
$contraseña=$_POST["contraseña"]; 

$conexion=mysqli_connect("localhost:3307","root","root","tiendavirtual");
if (mysqli_connect_errno()) {
	echo "error al conectar a MYSQL";
	exit();
}

//$consulta = mysqli_prepare($conexion, "CALL sp_in_login(?,?,@f)");
//mysqli_stmt_bind_param($consulta, "ss", $usuario,$contraseña);
//mysqli_stmt_execute($consulta);
//mysqli_stmt_close($consulta);
//$result = mysqli_query($conexion,'SELECT @f');
//list($salida) = mysqli_fetch_row($result);
//mysqli_free_result($result);

$rs = $conexion->query( "CALL sp_in_login('".$usuario."', '".$contraseña."', @f, @r)" );
$rs = $conexion->query( 'SELECT  @f' );
$row = mysqli_fetch_assoc($rs);


if ($row['@f'] != null) {
		 echo "0";
      } else {
         echo "1";
      }



//$consulta="SELECT * FROM USERS WHERE USUARIO='$usuario' AND contrasenia='$contraseña'";
//$resultado=mysqli_query($conexion,$consulta);
//$fila=mysqli_num_rows($resultado);

//if($fila==1){
//	$data=mysqli_fetch_array($resultado);
//	echo "1";
//}else{
//	echo "fd";
	


?>
