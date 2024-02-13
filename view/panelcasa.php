<?php
session_start();

if (!isset($_SESSION['userhouse'])) {
    header("Location:../index.html");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Panel-casa</title>
</head>
    <header>
    <td><a href="../index.html" class="btn btn-info"
            placehoder="Modificar Registro"><i class="fa-regular fa-pen-to-square">Salir</i></a></td>
    </header>
<body  style="background-color: #F9C3F3;">

    <div class="container text-center">
        <div class="row align-items-start">
        <h1 class="display-1">SISTEMA DE ADMINISTRACION</h1>
            </div>
            
            
        
<br><br><br><br>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" >
            <div class="container" style="background-color: #E0FFFF; margin: 0; padding: 0;" >
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto flex-column">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary  " href="./costos.php"><h1>Costos</h1></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="./ventas.php"><h1>Ventas</h1></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="./personal.php"><h1>Personal</h1></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
