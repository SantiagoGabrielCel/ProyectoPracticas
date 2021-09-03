<?php
	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){
			try{
				$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
				self::$conexion= new PDO('mysql:host=localhost:3307;dbname=tiendavirtual','root','root',$pdo_options);
				echo "Conecto";
				
			}
			catch (Exception $ex){
				die("Error" . $ex->getMessage());
				echo "Linea de error " . $ex->getLine();
			}
			return self::$conexion;
		}		
	} 
?>