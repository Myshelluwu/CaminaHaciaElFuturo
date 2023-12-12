<?php
session_start();
include_once('./include/dbconn.php');

if(isset($_POST['ingresar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $stmt = $db->prepare("INSERT INTO universitario (nombre, apellido, telefono, correo, contrasena, universidad, carrera, estado) VALUES (:nombre, :apellido, :telefono, :correo, :contrasena, :universidad, :carrera, :estado)");

        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':apellido', $_POST['apellido']);
        $stmt->bindParam(':telefono', $_POST['telefono']);
        $stmt->bindParam(':correo', $_POST['correo']);
        $stmt->bindParam(':contrasena', $_POST['contrasena']);
        $stmt->bindParam(':universidad', $_POST['universidad']);
        $stmt->bindParam(':carrera', $_POST['carrera']);
        $stmt->bindParam(':estado', $_POST['estado']);

        $_SESSION['message'] = $stmt->execute() ? 'Usuario añadido correctamente' : 'Algo salió mal, no se guardó correctamente el producto';

    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->close();

} else {
    $_SESSION['message'] = 'Llene completamente el formulario';
}
header('location: login.php');
?>