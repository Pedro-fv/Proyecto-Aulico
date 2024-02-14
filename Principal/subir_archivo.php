<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $nombre_autor = $_POST['autor'];

    // Rutas de los directorios de destino para archivos
    $directorio_destino_libros = "C:\\Users\\pedro\\Downloads\\Libros\\";
    $directorio_destino_imagenes = "C:\\Users\\pedro\\Downloads\\veterinaria\\Imagen2\\";

    // Rutas de los archivos
    $ruta_archivo = $directorio_destino_libros . basename($_FILES["archivo"]["name"]);
    $ruta_imagen = $directorio_destino_imagenes . basename($_FILES["imagen"]["name"]);

    // Verificar y mover el archivo PDF
    if (!move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta_archivo)) {
        echo "Error al subir el archivo PDF.";
        exit;
    }

    // Verificar y mover la imagen
    if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
        echo "Error al subir la imagen.";
        exit;
    }

    // Ruta relativa de la imagen para la base de datos
    $ruta_relativa_imagen = "../Imagen2/" . basename($_FILES["imagen"]["name"]);

    // Incluir archivo de conexión a la base de datos
    include("InicioBD.php");

    // Guardar el libro en la tabla 'libros'
    $consulta_libro = $conexion->prepare("INSERT INTO libros (titulo, descripcion, ruta_archivo) VALUES (?, ?, ?)");
    $consulta_libro->bind_param("sss", $titulo, $descripcion, $ruta_archivo);
    if (!$consulta_libro->execute()) {
        echo "Error al guardar la información del libro en la base de datos.";
        exit;
    }

    // Obtener el ID del libro insertado
    $id_libro = $conexion->insert_id;

    // Guardar la imagen en la tabla 'imagenes_libros'
    $consulta_imagen = $conexion->prepare("INSERT INTO imagenes_libros (id_libro, ruta_imagen) VALUES (?, ?)");
    $consulta_imagen->bind_param("is", $id_libro, $ruta_relativa_imagen);
    if (!$consulta_imagen->execute()) {
        echo "Error al guardar la información de la imagen en la base de datos.";
        exit;
    }

    // Guardar el autor en la tabla 'autores'
    $consulta_autor = $conexion->prepare("INSERT INTO autores (nombre) VALUES (?)");
    $consulta_autor->bind_param("s", $nombre_autor);
    if (!$consulta_autor->execute()) {
        echo "Error al guardar la información del autor en la base de datos.";
        exit;
    }

    // Obtener el ID del autor insertado
    $id_autor = $conexion->insert_id;

    // Guardar la asociación entre el libro y el autor en la tabla 'libro_autor'
    $consulta_libro_autor = $conexion->prepare("INSERT INTO libro_autor (id_libro, id_autor) VALUES (?, ?)");
    $consulta_libro_autor->bind_param("ii", $id_libro, $id_autor);
    if (!$consulta_libro_autor->execute()) {
        echo "Error al guardar la asociación entre el libro y el autor en la base de datos.";
        exit;
    }

    // Guardar la asociación entre el libro y la categoría en la tabla 'libro_categoria'
    $consulta_categoria = $conexion->prepare("INSERT INTO libro_categoria (id_libro, id_categoria) VALUES (?, ?)");
    $consulta_categoria->bind_param("ii", $id_libro, $categoria);
    if (!$consulta_categoria->execute()) {
        echo "Error al guardar la información de la categoría en la base de datos.";
        exit;
    }

    // Redireccionar con éxito
    header("Location: Pagina2.php?exito=1");
    exit;
}
?>
