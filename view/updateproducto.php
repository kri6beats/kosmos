<?php
include "../model/conect.php";
$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;
$db=$Conexion->query("SELECT * from productos where ID=$id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('precioEntrante').addEventListener('input', calcularCampos);

            function calcularCampos() {
                
                var precioEntra = parseFloat(document.getElementById('precioEntrante').value);
                var precioVenta=precioEntra*2.3;

                
                var iva = precioVenta * 0.19;

                
                var precioSugerido = precioEntra * 2.3;

                

                document.getElementById('precioVenta').value= precioVenta.toFixed(2);
                document.getElementById('iva').value = iva.toFixed(2);
                document.getElementById('precioSugerido').value = precioSugerido.toFixed(2);
            }
        });
    
    </script>
    <div class="container mt-3">
        <div class="row justify-content-center">
        <form class="col-md-1" method="POST" action= "../controller/updateProducto.php">
    <h3 class="text-center text-secundary">MODIFICAR PRODUCTO</h3>
    <input type="hidden" name="id" value="<?=$_GET["ID"] ?>">
    <?php
    
        
        while($dato=$db->fetch_object()){?>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?=$dato->NOMBRE?>" required>

        <label for="precioEntrante">Precio </label>
        <input type="number" id="precioEntrante" name="precioEntrante" value="<?=$dato->PRECIO_LLEGADA?>" required>

        <label for="iva">Iva</label>
        <input type="number" id="iva" name="iva"  value="<?=$dato->IVA?>" required>

        <label for="cantidad">cantidad</label>
        <input type="number" id="cantidad" name="cantidad"  value="<?= $dato->CANTIDAD?>" required>

        <label for="fecha">fecha:</label>
        <input type="date" id="fecha" name="fecha"  value="<?= $dato->FECHA?>" required>

        <label for="precioSugerido">precio sugerido</label>
        <input type="number" id="precioSugerido" name="precioSugerido"  value="<?= $dato->PRECIO_SUGERIDO?>" required>

        <label for="precioVenta">precio de venta</label>
        <input type="number" id="precioVenta" name="precioVenta" value="<?= $dato->PRECIO_VENTA?>"  required>
        <br><br>
        <?php }
            ?>

        <button type="submit" class="btn btn-primary" name="btnUpdateProducto" value=ok> Actualizar</button>
    </form>
         
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>