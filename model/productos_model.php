<?php
    class productos_model{
        private $db;
        private $productos;
        private $codigo;
        private $nombre;
        private $precio;
        private $ID_CATEGORIA;
        

        
       function __construct(){
            require("model/conexion.php");
            $this->db=Db::conectar();
            $this->productos=array();
        }
        public function getProducts(){
            $consulta = $this->db->query("SELECT * FROM tiendavirtual.productos");
			while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
               $this->productos[]=$filas;
            }
			return $this->productos;
			
 
        }
         public  function insertProduct(String $nombre,int $precio,int $categoria){
            //$this->codigo=$codigo;
            $this->nombre=$nombre;
            $this->precio=$precio;
            $this->ID_CATEGORIA=$ID_CATEGORIA;
            $sql="INSERT INTO tiendavirtual.productos (nombre,precio,ID_CATEGORIA) VALUES(?,?,?)";
            $insert= $this->db->prepare($sql);
            $datos=array($this->codigo,$this->nombre,$this->precio,$this->categoria);
            $respues=$insert->execute($datos);
        }
    }
	//$var = new productos_model();
	//$var->getProducts();
	//echo $var;
?>