<?php
session_start();
include_once('./include/dbconn.php');

if(isset($_POST['ingresar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $stmt = $db->prepare("INSERT INTO postulacion (id_oferta, id_universitario, fecha) 
        SELECT :id_oferta, id as id_universitario, NOW()
        FROM universitario
        WHERE correo = :correo");

        $stmt->bindParam(':id_oferta', $_GET['id']); // Usar $_GET para obtener el id de la oferta desde la URL
        $stmt->bindParam(':correo', $_POST['correo']);

        $_SESSION['message'] = $stmt->execute() ? 'Postulacion añadida correctamente' : 'Algo salió mal, no se guardó la postulación';

    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error en la base de datos: ' . $e->getMessage();
    } finally {
        $database->close();
    }

} else {
    $_SESSION['message'] = 'Llene completamente el formulario';
}
header('location: egresados.php');
?>
