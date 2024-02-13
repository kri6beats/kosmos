<!-- <?php
include "../model/conect.php";
?>
<?php
if(!empty(_POST[btnFacturar])){
    if(!empty(_POST['nombre']&& !empty(_POST['cantidad'])&& !empty(_POST['precio'])))
    {
        $nombre=POST_['nombre'];
        $cantidad=_POST['cantidad'];
        $precio=_POST['precio'];

        $fechaActual = date("Y-m-d H:i:s");

        
        $result = $Conexion->query("INSERT INTO ventas (nombre, precio, cantidad, fecha) VALUES ('$nombre', $precio, $cantidad, '$fechaActual')");

     
        

        if ($result) {
            echo "Registro insertado correctamente.";
        } else {
            echo "Error al insertar el registro: " . $Conexion->error;
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?> -->