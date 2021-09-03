<?php
    require_once("model/productos_model.php");
    if (!empty($_POST['CODIGO'])) {
        //$codigo=$_POST["CODIGO"];
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $ID_CATEGORIA=$_POST["ID_CATEGORIA"];
        $productos= new productos_model();
        $productos->insertProduct($nombre,$precio,$ID_CATEGORIA);

     }

    $productos= new productos_model();
     
    $matriz= $productos->getProducts();
    


    require_once("view/view.php");

?>

