<?php
$carpetaDestino = "materiales/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0) {
        $nombreArchivo = basename($_FILES["archivo"]["name"]);
        $rutaFinal = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaFinal)) {
            echo "Archivo subido con éxito: <a href='$rutaFinal'>$nombreArchivo</a><br>";
            if (!empty($_POST["descripcion"])) {
                echo "Descripción: " . htmlspecialchars($_POST["descripcion"]);
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "No se recibió ningún archivo o hubo un error.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
