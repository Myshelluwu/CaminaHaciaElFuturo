<?php
session_start();
include_once('include/dbconn.php');

if (isset($_POST['editar'])) {
    $database = new Connection();
    $db = $database->open();
    $userId = $_SESSION['user_id'];

    try {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        // Preparar la consulta
        $stmt = $db->prepare("UPDATE reg_usuarios SET correo = :correo, contrasena = :contrasena WHERE id = :user_id");
        
        // Asociar parámetros
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':user_id', $userId);

        // Ejecutar la consulta
        $stmt->execute();

        $_SESSION['message'] = ($stmt->rowCount() > 0) ? 'Perfil actualizado correctamente' : 'No se pudo actualizar el perfil';
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error al actualizar el perfil: ' . $e->getMessage();
    } finally {
        $database->close();
    }
} else {
    $_SESSION['message'] = 'Completa correctamente el formulario';
}

header('location: perfil.php');
?>
