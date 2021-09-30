<?php     
$conexion=mysqli_connect("localhost:3307","root","root","tiendavirtual");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}


$tabla="";
$query="SELECT * FROM productos";

$productos=$conexion->query($query);
if ($productos->num_rows > 0)
{
    while($producto= $productos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$producto['codigo'].'</td>
			<td>'.$producto['nombre'].'</td>
			<td>'.$producto['categoria'].'</td>
            <td>
                  
                  <div class="btn-group btn-group-sm">
                    <button type="button" id="edit-product" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-primary">Eliminar</button>
                  </div>
                </td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;