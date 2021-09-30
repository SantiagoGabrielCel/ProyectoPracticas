<?php     
$conexion=mysqli_connect("localhost","root","","tienda");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}

$nombre = $_POST['nombre'];
$anio = $_POST['anio'];
$puntaje = $_POST['puntaje'];
$duracion= $_POST['duracion'];
$genero =$_POST['genero'];
$descripcion =$_POST['descripcion'];
