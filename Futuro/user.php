<?php
include_once('./include/dbconn.php');

function obtenerCorreoUsuario() {
    
    $userId = $_SESSION['user_id'];

    $database = new Connection();
    $bd = $database->open();

    $stmt = $bd->prepare("SELECT correo FROM reg_usuarios WHERE id = :user_id");
    $stmt->bindParam(':user_id', $userId); 
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $database->close();

    return $userData['correo'];
}

function obtenerContrasenaUsuario() {
    $userId = $_SESSION['user_id'];

    $database = new Connection();
    $bd = $database->open();

    $stmt = $bd->prepare("SELECT contrasena FROM reg_usuarios WHERE id = :user_id");
    $stmt->bindParam(':user_id', $userId); 
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $database->close();

    return $userData['contrasena'];
}

?>
