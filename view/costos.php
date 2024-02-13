<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
    <td><a href="./panelcasa.php" class="btn btn-info"
            placehoder="Modificar Registro"><i class="fa-regular fa-pen-to-square">Atras</i></a></td>

            <div class="col-md-15 d-flex justify-content-end">
            <td><a href="../index.html" class="btn btn-danger"
            placehoder="Modificar Registro"><i class="fa-regular fa-pen-to-square">salir</a></td>
            </div>
    </header>
<script>
    function eliminar() {
        var respuesta=confirm("Estas Seguro de Eliminar el Registro??");
        return respuesta;
    }
</script>
<body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('precioEntrante').addEventListener('input', calcularCampos);
        document.getElementById('precioVenta').addEventListener('input', calcularIva);

        function calcularCampos() {
            var precioEntra = parseFloat(document.getElementById('precioEntrante').value);
            var precioVenta = precioEntra * 2.3;
            var iva = precioVenta * 0.19;
            var precioSugerido = precioEntra * 2.3;

            document.getElementById('precioVenta').value = precioVenta.toFixed(2);
            document.getElementById('iva').value = iva.toFixed(2);
            document.getElementById('precioSugerido').value = precioSugerido.toFixed(2);
        }

        function calcularIva() {
            var precioVenta = parseFloat(document.getElementById('precioVenta').value);
            var iva = precioVenta * 0.19;

            document.getElementById('iva').value = iva.toFixed(2);
        }
    });
</script>

    <div class="container mt-3">
        <div class="row justify-content-center">
        
    <form class="col-md-1" method="POST" action="../controller/ingresoProducto.php">
        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="precioEntrante">Precio :</label>
        <input type="text" id="precioEntrante" name="precioEntrante" required>

        <label for="iva">Iva</label>
        <input type="text" id="iva" name="iva" required>

        <label for="cantidad">cantidad</label>
        <input type="number" id="cantidad" name="cantidad" required>

        <label for="fecha">fecha:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="precioSugerido">precio sugerido</label>
        <input type="number" id="precioSugerido" name="precioSugerido" required>

        <label for="precioVenta">precio de venta</label>
        <input type="number" id="precioVenta" name="precioVenta" required>
        <br><br>

        <button type="submit" class="btn btn-primary" name="btnIngresarProducto" value=ok> Ingresar Producto</button>
    </form>
         
        </div>
    </div>

    <div class="container mt-5 " style="background-color: #F9C3F3;">
<table class="table table-bordered table-striped">
  <thead class="thead-dark" style="background-color: #F9C3F3;">
    <tr>
     <!-- <th scope="col">Id_Persona</th> -->
     
      <th scope="col">Descripcion</th>
      <th scope="col">Precio Entrante</th>
      <th scope="col">Iva</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fecha</th>
      <th scope="col">Precio Sugerido</th>
      <th scope="col">Precio Venta</th>
      
      
    </tr >
  </thead>
  <tbody class="table-group-divider"
    <?php
            include "../model/conect.php";
         $al=$Conexion->query("SELECT * from productos ORDER BY NOMBRE ASC");
         while($datos=$al->fetch_object()){
     ?>    
            <tr>
            <td><?=$datos->NOMBRE?></td>
            <td><?=$datos->PRECIO_LLEGADA?></td>
            <td><?=$datos->IVA?></td>
            <td><?= $datos->CANTIDAD?></td>
            <td><?= $datos->FECHA?></td>
            <td><?= $datos->PRECIO_SUGERIDO?></td>
            <td><?= $datos->PRECIO_VENTA?></td>
            <td><a href="./updateproducto.php?ID=<?=$datos->ID?>" class="btn btn-warning" 
            placehoder="Modificar Registro"><i class="fa-regular fa-pen-to-square">Actualizar</i></a></td>
            <td><a onclick="return eliminar()"href="../controller/eliminarProducto.php?id=<?=$datos->ID?>" 
            class="btn btn-small btn-danger"><i class="fa-solid fa-trash-arrow-up">Eliminar</i></a></td>
            
          </tr> 
 <?php }
          ?>
  </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>