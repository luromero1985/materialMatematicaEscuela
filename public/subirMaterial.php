<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Material</title>
</head>
<body>
    <h1>Subir Material</h1>
    
    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'ok'): ?>
        <p style="color: green;">Archivo subido correctamente.</p>
    <?php endif; ?>

    <form action="editar.php" method="post" enctype="multipart/form-data">
        <label>Título:<br>
            <input type="text" name="titulo" required>
        </label><br><br>

        <label>Archivo PDF:<br>
            <input type="file" name="archivo" accept=".pdf" required>
        </label><br><br>

        <label>Año:<br>
            <select name="anio" required>
                <option value="1">1° Año</option>
                <option value="3">3° Año</option>
                <option value="6">6° Año</option>
            </select>
        </label><br><br>

        <label>Descripción (opcional):<br>
            <textarea name="descripcion" rows="4" cols="40"></textarea>
        </label><br><br>

        <button type="submit">Subir</button>
        <button type="button" onclick="window.location.href='index.php'">Cancelar</button>
    </form>
</body>
</html>
