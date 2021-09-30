<?php
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

if ($row['@f'] != null and $row['@r'] != null) {
		 echo $rol;
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
