<?php
// Datos de conexión
$host = "localhost";
$usuario = "root";
$contrasena = ""; // tu contraseña si tenés
$basedatos = "escuela";

// Conexión
$conexion = new mysqli($host, $usuario, $contrasena, $basedatos);
if ($conexion->connect_error) {
    die("Error al conectar: " . $conexion->connect_error);
}

// Verificar que haya un archivo
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $nombreOriginal = $_FILES['archivo']['name'];
    $temporal = $_FILES['archivo']['tmp_name'];

    // Crear nombre único para evitar sobrescritura
    $nombreFinal = uniqid() . "_" . basename($nombreOriginal);
    $rutaDestino = "uploads/" . $nombreFinal;

    // Mover el archivo
    if (move_uploaded_file($temporal, $rutaDestino)) {
        // Datos adicionales
        $anio = $_POST['anio'];
        $descripcion = $_POST['descripcion'] ?? "";

        // Insertar en la base
        $stmt = $conexion->prepare("INSERT INTO materiales (nombre_archivo, ruta, anio, descripcion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $nombreOriginal, $nombreFinal, $anio, $descripcion);
        $stmt->execute();

        echo "Archivo subido correctamente.<br>";
        echo "<a href='subirMaterial.html'>Subir otro</a>";
    } else {
        echo "Error al mover el archivo.";
    }
} else {
    echo "No se recibió ningún archivo válido.";
}

$conexion->close();
?>
