<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "escuela");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los materiales
$sql = "SELECT * FROM materiales ORDER BY fecha_subida DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materiales disponibles</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Reutilizás tu CSS -->
</head>
<body>
    <h2>Lista de materiales</h2>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Año</th>
                <th>Archivo</th>
                <th>Fecha de subida</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado->num_rows > 0): ?>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila["titulo"]) ?></td>
                        <td><?= htmlspecialchars($fila["descripcion"]) ?></td>
                        <td><?= $fila["anio"] ?></td>
                        <td><a href="uploads/<?= urlencode($fila["nombre_archivo"]) ?>" target="_blank">Ver</a></td>
                        <td><?= $fila["fecha_subida"] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay materiales cargados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conexion->close();
?>
