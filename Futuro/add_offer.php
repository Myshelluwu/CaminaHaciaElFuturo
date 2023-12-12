<?php
session_start();
include_once('./include/dbconn.php');

if (isset($_POST['agregar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $stmt = $db->prepare("INSERT INTO oferta (`id_empresa`, `cargo`, `salario`, `area`, `estado`, `fecha`)
        SELECT id AS id_empresa, :cargo, :salario, :area, :estado, now()
        FROM empresa
        WHERE nombre_empresa = :empresa");

        $stmt->bindParam(':empresa', $_POST['empresa']);
        $stmt->bindParam(':cargo', $_POST['cargo']);
        $stmt->bindParam(':salario', $_POST['salario']);
        $stmt->bindParam(':area', $_POST['area']);
        $stmt->bindParam(':estado', $_POST['estado']);

        $_SESSION['message'] = $stmt->execute() ? 'Oferta añadida correctamente' : 'Algo salió mal, no se guardó correctamente la oferta';
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error en la base de datos: ' . $e->getMessage();
        exit();
    } finally {
        $database->close();
    }
} else {
    $_SESSION['message'] = 'Llene completamente el formulario';
}

header('location: empresarios.php');
?>
