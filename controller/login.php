<?php
include "../model/conect.php";


session_start();


if (!empty($_POST['Btningresar'])) {
    
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        
        $db= $Conexion->prepare("SELECT * FROM login WHERE USER = ? AND PASSWORD = ?");
        $db->bind_param("ss", $usuario, $password);
        $db->execute();
        $result = $db->get_result();

        if ($datos = $result->fetch_object()) {
       
            $_SESSION['user'] = $datos->USER;
            header("location: ../view/facturador.php");
        } else {
            echo '<div class="alert alert-danger">El usuario no existe</div>';
            header("location:../index.html");
        }
    } else {
        echo "<div class='alert alert-danger'>Los campos están vacíos</div>";
        header("location:../index.html");
    }
}
?>

