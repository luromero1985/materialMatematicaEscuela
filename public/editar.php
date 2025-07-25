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

// Verificar que haya un archivo y que se haya enviado el título
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK && isset($_POST['titulo'])) {

    $titulo = $_POST['titulo'];
    $nombreOriginal = $_FILES['archivo']['name'];
    $temporal = $_FILES['archivo']['tmp_name'];

    // Crear nombre único para evitar sobrescritura
    $nombreFinal = uniqid() . "_" . basename($nombreOriginal);
    $rutaDestino = "uploads/" . $nombreFinal;

    // Mover el archivo
    if (move_uploaded_file($temporal, $rutaDestino)) {
        // Datos adicionales
        $anio = intval($_POST['anio']);
        $descripcion = $_POST['descripcion'] ?? "";

        // Insertar en la base (incluyendo título)
        $stmt = $conexion->prepare("INSERT INTO materiales (titulo, nombre_archivo, ruta, anio, descripcion) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss", $titulo, $nombreOriginal, $nombreFinal, $anio, $descripcion);
        $stmt->execute();
        $stmt->close();

        $conexion->close();

        // Redirigir con mensaje de éxito
        header("Location: subirMaterial.php?mensaje=ok");
        exit;
    } else {
        $conexion->close();
        die("Error al mover el archivo.");
    }
} else {
    $conexion->close();
    die("No se recibió ningún archivo válido o falta el título.");
}
?>
