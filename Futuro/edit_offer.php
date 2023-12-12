<?php
    session_start();
    include_once('include/dbconn.php');

    if(isset($_POST['editar'])){
        $database = new Connection();
        $db = $database -> open();

        try{
            $id=$_GET['id'];
            $talla = $_POST['talla'];
            $cantidad = $_POST['cantidad'];
            
            $sql = "UPDATE oferta SET talla = '$talla', cantidad = '$cantidad' WHERE id_producto = '$id' ";

            $_SESSION['message'] = ($db->exec($sql)) ? 'Talla actualizado correctamente' : 'No se pudo actualizar la talla';

        }catch(PDOException $e){
            $_SESSION['message'] = $e->getPrevious();
        }
        $database->close();

    }else{
        $_SESSION['message'] = 'Completa correctamente el formulario';
    }
    header('location: pedidos.php');

?>