function obtenerValoracionLibro(idLibro) {
    // Realizar una solicitud AJAX al archivo PHP
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../Principal/ObteValor.php?id_libro=' + idLibro, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Procesar la respuesta del servidor
            var valoracion = JSON.parse(xhr.responseText);
            // Llamar a la función para mostrar las estrellas de valoración
            mostrarEstrellitasValoracion(valoracion);
        }
    };
    xhr.send();
}

// Función para mostrar las estrellitas de valoración
function mostrarEstrellitasValoracion(valoracion) {
    // Verificar si se obtuvo la valoración
    if (valoracion.hasOwnProperty('promedio_valoracion') && valoracion.hasOwnProperty('total_valoraciones')) {
        var promedioValoracion = valoracion.promedio_valoracion;
        var totalValoraciones = valoracion.total_valoraciones;
        // Crear el HTML de las estrellitas de valoración
        var htmlEstrellitas = '<p>Valoración promedio: ' + promedioValoracion.toFixed(1) + ' de 5 (' + totalValoraciones + ' valoraciones)</p>';
        htmlEstrellitas += '<div class="valoracion-estrellas">';
        for (var i = 1; i <= 5; i++) {
            if (i <= Math.round(promedioValoracion)) {
                htmlEstrellitas += '<span class="fa fa-star checked"></span>';
            } else {
                htmlEstrellitas += '<span class="fa fa-star"></span>';
            }
        }
        htmlEstrellitas += '</div>';
        // Agregar las estrellitas al elemento con el ID "valoracion-libro"
        document.getElementById('valoracion-libro').innerHTML = htmlEstrellitas;
    }
}
