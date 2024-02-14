function toggleComentarioForm(idLibro) {
    var formularioComentario = document.getElementById("formulario-comentario-" + idLibro);
    if (formularioComentario.style.display === "none") {
        formularioComentario.style.display = "block";
    } else {
        formularioComentario.style.display = "none";
    }
}