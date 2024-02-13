
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location:../index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  
    <style>
        .scrollable-column {
            max-height:76vh;
            overflow-y: auto;
        }

            tr:hover {
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ;
        }

        tr:hover td:first-child {
            transform: scale(1.05);
        }
        
        #cuerpoTablaFacturacion tr:hover td {
        background-color: #F98175; 
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        }
    
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <div class="col-md-13 d-flex justify-content-end">
            <tr><td><a href="../index.html" class="btn btn-danger"
            placehoder="Modificar Registro"><i class="fa-regular fa-pen-to-square"></i>salir</a></td></tr>
            </div>
           
    <title>Facturador</title>
    

</head>

<body>




    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col" style="background-color: #F9C3F3;">

                <h1 class="text-center p-5">Productos</h1>
                <div class="container mt-5 scrollable-column " style="background-color: #F9C3F3;">
                    <table class="table table-bordered table-striped">

                        <thead class="thead-dark" style="background-color: #F9C3F3;">
                            <tr>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio Venta</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider ">
                            <?php
                            include "../model/conect.php";
                            $database = $Conexion->query("SELECT * FROM productos ORDER BY NOMBRE ASC");
                            while ($datos = $database->fetch_object()) {
                            ?>
                                <tr class="producto" data-nombre="<?= $datos->NOMBRE ?>" data-precio="<?= $datos->PRECIO_VENTA ?>">
                                    <td><?= $datos->NOMBRE ?></td>
                                    <td><?= $datos->PRECIO_VENTA ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col" style="background-color: #E0FFFF;">
                <h1 class="text-center p-5">Facturación</h1>
                <div class="container mt-5 scrollable-column " style="background-color: #E0FFFF;">
                    <table class="table table-bordered table-striped" id="tablaFacturacion">

                        <thead class="thead-dark" style="background-color: #E0FFFF;">
                            <tr>
                                <th scope="col">Descripción</th>
                                <th scope= "col">Cantidad</th>
                                <th scope="col">Precio Venta</th>
                                <th scope="col">T.uni</th>
                            </tr>
                            
                        </thead>
                        <tbody class="table-group-divider" id="cuerpoTablaFacturacion">

                        </tbody>
                        <tr >
                              <th></th>
                              <th class= "text-center p-2" scope="col">Total</th>
                              <th><span id="totalLabel">0</span></th>
                            </tr>
                    </table>

                    <button type="submit" class="btn btn-primary" name="btnFacturar" value=ok>Facturar</button>
                    <button type="button" class="btn btn-danger" name="btnCancelar" id="btnCancelar" value=ok>Cancelar</button>
                </div>
            </div>

            <div class="col" style="background-color: #F9C3F3;">
                <h1 class="text-center p-5">Rapidos</h1>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
       
<script src="../js/facturacion.js"></script>





</body>

</html>