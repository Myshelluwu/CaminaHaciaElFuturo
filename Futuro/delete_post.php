<?php
    session_start();
    include_once('./include/dbconn.php');

    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database -> open();
        try{
            $sql = "DELETE FROM postulacion WHERE id = '".$_GET['id']."'";
            $_SESSION['message'] = ($db->exec($sql)) ? 'Postulacion eliminada correctamente' : 'No se pudo eliminar la postulacion, revisa los datos';
        }catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Llene completamente el formulario';
    }
    header('location: egresados.php');

?>