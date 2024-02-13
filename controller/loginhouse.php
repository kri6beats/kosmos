<?php
include "../model/conect.php";
session_start();

if (!empty($_POST['btnLoginHouse'])) {
    if (!empty($_POST['usuariohouse']) and !empty($_POST['passwordhouse'])) {
        $usuariohouse = $_POST['usuariohouse'];
        $passwordhouse = $_POST['passwordhouse'];

        
        $stmt = $Conexion->prepare("SELECT * FROM login WHERE USERHOUSE = ? AND PASSWORDHOUSE = ? ");
        $stmt->bind_param("ss", $usuariohouse, $passwordhouse);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($datos = $result->fetch_object()) {
            $_SESSION['userhouse'] = $datos->USERHOUSE;
            header("location:../view/panelcasa.php");
            
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
