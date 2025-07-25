<?php
$host = "localhost";
$usuario = "root";
$clave = ""; // cambiar si tenés contraseña
$bd = "escuela";

$conn = new mysqli($host, $usuario, $clave, $bd);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
