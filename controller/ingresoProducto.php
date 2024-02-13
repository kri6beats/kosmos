<?php
session_start();

if (!isset($_SESSION['userhouse'])) {
    header("Location:../index.html");
    exit(); 
}
?>
<?php

if (!empty($_POST['btnIngresarProducto'])){
    if(!empty($_POST['nombre']) && !empty($_POST['precioEntrante']) && !empty($_POST['iva']) && !empty($_POST['cantidad']) && !empty($_POST['fecha'])
    && !empty($_POST['precioSugerido']) && !empty($_POST['precioVenta']))
{
    $nombre=$_POST['nombre'];
    $precioEnt=$_POST['precioEntrante'];
    $iva=$_POST['iva'];
    $cantidad=$_POST['cantidad'];
    $fecha=$_POST['fecha'];
    $precioSug=$_POST['precioSugerido'];
    $precioVen=$_POST['precioVenta'];
    
    include "../model/conect.php";
    $db=$Conexion-> query("INSERT INTO productos(NOMBRE,PRECIO_LLEGADA,IVA,CANTIDAD,FECHA,PRECIO_SUGERIDO,PRECIO_VENTA)
    VALUES('$nombre','$precioEnt','$iva','$cantidad','$fecha','$precioSug','$precioVen')");

    if($db==1)
    {
        
        header("location:../view/costos.php");
        
       
    }
    else
    {
        echo '<div class="alert alert-danger">Datos No Ingresados</div>';
        header("location:../view/costos.php");
    }
}
else
{
    echo '<div class="alert alert-warning">Algunos campos estan vacios</div>';
    header("location:../view/costos.php");
}

}
?>