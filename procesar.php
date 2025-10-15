<?php
// Iniciar session
session_start();

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "mi_base");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
// Leer los datos del formulario
$nombre =  $_POST['nombre'];
$email = $_POST['email'];
$producto = $_POST['producto'];
$mes = $_POST['mes'];
$cantidad = $_POST['cantidad'];
$terminos = isset($_POST['terminos']) ? 'Sí' : 'No';
$fechaHora = date("Y-m-d H:i:s"); // Fecha y hora actuales

// Guardar en la base de datos
$sql = "INSERT INTO pedidos (nombre, email, producto, mes, cantidad, terminos, fecha_hora)
        VALUES ('$nombre', '$email', '$producto', '$mes', '$cantidad', '$terminos', '$fechaHora')";

if (mysqli_query($conexion, $sql)) {
    echo "<h3> Registro guardado en la base de datos correctamente.</h3>";
} else {
    echo "<h3> Error al guardar: " . mysqli_error($conexion) . "</h3>";
}

// Guardar en la sesión
if (!isset($_SESSION['registros'])) {
    $_SESSION['registros'] = [];
}
$_SESSION['registros'][$fecha_hora] = [
    'email'    => $_POST['email'],
    'mes'      => $_POST['mes'],
    'cantidad' => $_POST['cantidad']
];

// Registrar cookie
setcookie('ultimo_registro', $fecha_hora, time() + 3600, "/");
echo "<p style='color:green;'>Registro guardado correctamente.</p>";

// Cerrar conexión
mysqli_close($conexion);
?>
