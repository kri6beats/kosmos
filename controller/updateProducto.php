<?php
include "../model/conect.php";
include "../view/updateproducto.php";


if (!empty($_POST['btnUpdateProducto'])){
    if(!empty($_POST['nombre']) && !empty($_POST['precioEntrante']) && !empty($_POST['iva']) && !empty($_POST['cantidad']) && !empty($_POST['fecha'])
    && !empty($_POST['precioSugerido']) && !empty($_POST['precioVenta']) && !empty ($_POST['id']))
{   $id= $_POST['id'];
    $nombre=$_POST['nombre'];
    $precioEnt=$_POST['precioEntrante'];
    $iva=$_POST['iva'];
    $cantidad=$_POST['cantidad'];
    $fecha=$_POST['fecha'];
    $precioSug=$_POST['precioSugerido'];
    $precioVen=$_POST['precioVenta'];
    
    $db = $Conexion->query("UPDATE productos SET NOMBRE='$nombre',
     PRECIO_LLEGADA='$precioEnt', IVA='$iva', CANTIDAD='$cantidad', FECHA='$fecha',
      PRECIO_SUGERIDO='$precioSug', PRECIO_VENTA='$precioVen' WHERE ID='$id'");

    if($db==1)
    {
        
        header("location:../view/costos.php");
        $Conexion.close();
        exit();
        
       
    }
    else
    {
        echo '<div class="alert alert-danger">Datos No Ingresados</div>';
    }
}
else
{
    echo '<div class="alert alert-warning">Algunos campos estan vacios</div>';
}

}
?>