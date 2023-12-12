<?php
if (isset($_GET['find'])) {
    $find = $_GET['find'];

    $sql = "SELECT * FROM ofertas WHERE area LIKE :find"; 

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':find', $find, PDO::PARAM_STR);

    $stmt->execute();

    while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $resultado['cargo'] . "<br>";
        echo "Otro campo: " . $resultado['salario'] . "<br>";
        echo "Area: " . $resultado['area'] . "<br>";
        echo "Otro campo: " . $resultado['estado'] . "<br>";
        echo "Otro campo: " . $resultado['fecha'] . "<br>";
    }

    if ($stmt->rowCount() === 0) {
        echo "No se encontraron resultados para el área proporcionado.";
        header('location: egresados.php');
        exit();
    }

} else {
    echo "No se proporcionó un área para buscar.";
}
?>
