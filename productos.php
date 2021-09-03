<?php     
$conexion=mysqli_connect("localhost:3307","root","root","tiendavirtual");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}


mysqli_set_charset($conexion, "utf8");


$tabla="";
$query="SELECT * FROM productos";

if(isset($_POST['producto']))
{
	$q=$conexion->real_escape_string($_POST['producto']);
	$query="SELECT * FROM productos WHERE 
		nombre LIKE '%".$q."%'";
}


$resultado=$conexion->query($query);
if ($resultado->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			
			<td>NOMBRE</td>
			<td>PRECIO</td>
			<td>CATEGORIA</td>
			
		</tr>';

	while($productos= $resultado->fetch_assoc())
	{
		$tabla.=
		'<tr>
			
			<td>'.$productos['nombre'].'</td>
			<td>'.$productos['precio'].'</td>
			<td>'.$productos['categoria'].'</td>
			
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;