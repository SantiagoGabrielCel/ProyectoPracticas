<?php

$CodigoMFA=$_POST["CodigoMFA"];

$conexion=mysqli_connect("localhost:3307","root","root","tiendavirtual");
if (mysqli_connect_errno()) {
	echo "error al conectar a MYSQL";
	exit();
}

$rs1 = $conexion->query( "CALL sp_MFAultimo(@Codigo)" );
$row2 = mysqli_fetch_assoc($rs1);
$Codigo = $row2['@CodigoSalida := codigo'];

if($CodigoMFA ===  $Codigo){
 	echo "2";
}else {
	echo "4";
	}

	

?>
