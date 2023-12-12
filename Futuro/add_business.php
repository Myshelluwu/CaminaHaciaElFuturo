<?php
session_start();
include_once('./include/dbconn.php');

if(isset($_POST['agregar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $stmt = $db->prepare("INSERT INTO empresa (nombre, apellido, telefono, correo, contrasena, nombre_empresa, sector, estado, rfc) VALUES (:nombre, :apellido, :telefono, :correo, :contrasena, :nombre_empresa, :sector, :estado, :rfc)");

        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':apellido', $_POST['apellido']);
        $stmt->bindParam(':telefono', $_POST['telefono']);
        $stmt->bindParam(':correo', $_POST['correo']);
        $stmt->bindParam(':contrasena', $_POST['contrasena']);
        $stmt->bindParam(':nombre_empresa', $_POST['nombre_empresa']);
        $stmt->bindParam(':sector', $_POST['sector']);
        $stmt->bindParam(':estado', $_POST['estado']);
        $stmt->bindParam(':rfc', $_POST['rfc']);

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