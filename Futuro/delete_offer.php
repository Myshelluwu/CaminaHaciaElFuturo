<?php
    session_start();
    include_once('./include/dbconn.php');

    if(isset($_GET['id_oferta'])){
        $database = new Connection();
        $db = $database -> open();
        try{
            $sql = "DELETE FROM oferta WHERE id = '".$_GET['id_oferta']."'";
            $_SESSION['message'] = ($db->exec($sql)) ? 'Oferta eliminado correctamente' : 'No se pudo eliminar la oferta, revisa los datos';
        }catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Llene completamente el formulario';
    }
    header('location: empresarios.php');

?>