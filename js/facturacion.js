
document.addEventListener("DOMContentLoaded", function () {
    const filasProductos = document.querySelectorAll('.producto');
    const totalLabel = document.getElementById('totalLabel');
    const cuerpoTablaFacturacion = document.getElementById('cuerpoTablaFacturacion');
    const btnFacturar = document.getElementById('btnFacturar'); 
    const btnCancelar = document.getElementById('btnCancelar');

    let totalt = 0;
    let factura={};

    filasProductos.forEach(function (fila) {
        fila.addEventListener('click', function () {
            const nombre = fila.getAttribute('data-nombre');
            const precio = parseFloat(fila.getAttribute('data-precio'));

            const nuevaFila = document.createElement('tr');
            nuevaFila.innerHTML = `
                <td>${nombre}</td>
                <td><input type="number" name="cantidad" value="1" min="1"></td>
                <td>${precio}</td>
                <td class="total-fila">0</td>
            `;
            nuevaFila.addEventListener('mouseover', function () {
                nuevaFila.style.backgroundColor = '#F98175';
            });

            nuevaFila.addEventListener('mouseout', function () {
                nuevaFila.style.backgroundColor = '';
            });

            cuerpoTablaFacturacion.appendChild(nuevaFila);

            const inputCantidad = nuevaFila.querySelector('input[name="cantidad"]');
            inputCantidad.addEventListener('input', function () {
                actualizarTotalFila(nuevaFila, precio);
            });

            inputCantidad.value = "1";

            nuevaFila.addEventListener('click', function (event) {
                const targetElementNuevaFila = event.target;

                if (targetElementNuevaFila.tagName !== 'INPUT' || targetElementNuevaFila.name !== 'cantidad') {
                    eliminarFila(nuevaFila);
                }
            });
        });
    });

    btnFacturar.addEventListener('click', function () {
        const filasFacturacion = document.querySelectorAll('#cuerpoTablaFacturacion tr');
        const productosFacturados = [];

        filasFacturacion.forEach(function (fila) {
            const nombre = fila.cells[0].textContent;
            const cantidad = parseInt(fila.cells[1].querySelector('input[name="cantidad"]').value, 10);
            const precio = parseFloat(fila.cells[2].textContent);

            productosFacturados.push({
                nombre: nombre,
                cantidad: cantidad,
                precio: precio
            });
            
            
        });
        

        // Aquí debes agregar la lógica para enviar la información al servidor y procesar la factura
        // Puedes usar AJAX para esto
        console.log(productosFacturados);
    });
    
   

    function actualizarTotalFila(fila, precio) {
        const cantidad = parseFloat(fila.querySelector('input[name="cantidad"]').value);
        const total = cantidad * precio;
        fila.querySelector('.total-fila').textContent = total.toFixed(0);

        actualizarTotalGeneral();
    }

    function actualizarTotalGeneral() {
        totalt = 0;
        const filasTotales = document.querySelectorAll('.total-fila');
        filasTotales.forEach(function (fila) {
            totalt += parseFloat(fila.textContent);
        });
        totalLabel.textContent = totalt.toFixed(0);
    }

    function eliminarFila(fila) {
        fila.remove();
        actualizarTotalGeneral();
    }
    

});

btnCancelar.addEventListener('click', function () {
        const filasFacturacion = document.querySelectorAll('#cuerpoTablaFacturacion tr');
        filasFacturacion.forEach(function (fila) {
            fila.remove();
            
        });
        actualizarTotalGeneral();   
        
    });
    