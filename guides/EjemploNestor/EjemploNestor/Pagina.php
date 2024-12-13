<?php
include_once 'Conexion.php';

//Consulta SELECT
$sql_leer = 'SELECT * FROM color';

$sqlsent = $miPDO->prepare($sql_leer);
$sqlsent->execute();

$resultado = $sqlsent->fetchAll();


//Agregar
if($_POST){
    $color = isset($_POST['color']) ? $_POST['color'] :'';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] :'';

    $sql_agregar = 'INSERT INTO color(color,descripcion) VALUES (?,?)';
    $sqlagre = $miPDO->prepare($sql_agregar);
    $sqlagre->execute(array($color,$descripcion));

    header('location:Pagina.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Color</td>
            <td>Descripción</td>
        </tr>
        <?php
        foreach ($resultado as $row) {
            echo '<tr>';
            echo "<td>" . $row['color'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo '</tr>';
        }
        ?>
    </table>
    <form method="post">
        <input type="text" name="color">
        <input type="text" name="descripcion">
        <input type="submit">
    </form>
</body>
</html>