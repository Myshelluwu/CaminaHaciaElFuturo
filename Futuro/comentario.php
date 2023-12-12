<?php
session_start();
include_once('./include/dbconn.php');

if(isset($_POST['comentar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $stmt = $db->prepare("INSERT INTO comentarios (nombre, correo, mensaje) VALUES (:nombre, :correo, :mensaje)");

        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':correo', $_POST['correo']);
        $stmt->bindParam(':mensaje', $_POST['mensaje']);

        $_SESSION['message'] = $stmt->execute() ? 'Comentario añadido correctamente' : 'Algo salió mal, no se guardó correctamente el comentario';

    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->close();

} else {
    $_SESSION['message'] = 'Llene completamente el formulario';
}
header('location: index.php');
?>