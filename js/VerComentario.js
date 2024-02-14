function toggleComentarios( $id_libro_actual2) {
  var contenedorComentarios = document.getElementById("contenedor-comentarios-" +  $id_libro_actual2);
  if (contenedorComentarios) {
      contenedorComentarios.style.display = (contenedorComentarios.style.display === "none") ? "block" : "none";
  }
}

