<?php
include "../model/conect.php";
    if (!empty($_GET['id'])) {
            $id=$_GET['id'];
            
        $sql=$Conexion->query("DELETE  FROM productos WHERE ID=$id");
            if ($sql==1) {
                echo "<div class='alert alert-warning'>Persona Eliminada correctamente</div>";
                header("location:../view/costos.php");
            } else {
                echo "<div class='alert alert-danger'>Error a Modificar la persona</div>";
        }
    }
?>

