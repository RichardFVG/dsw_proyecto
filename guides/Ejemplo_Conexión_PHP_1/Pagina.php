<?php
// Incluir el archivo de conexión a la base de datos
include_once 'Conexion.php';

// LEER - Obtener los registros de la tabla 'color'

// Definir la consulta SQL para seleccionar todos los registros
$sql_leer = 'SELECT * FROM color';

// Preparar la consulta SQL
$gsent = $miPDO->prepare($sql_leer);

// Ejecutar la consulta preparada
$gsent->execute();

// Obtener todos los resultados en un array asociativo
$resultado = $gsent->fetchAll();

// AGREGAR - Insertar un nuevo registro en la tabla 'color'

// Verificar si el formulario fue enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el valor del campo 'color' del formulario, o una cadena vacía si no está definido
    $color = isset($_POST['color']) ? $_POST['color'] : '';

    // Obtener el valor del campo 'descripcion' del formulario, o una cadena vacía si no está definido
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

    // Definir la consulta SQL para insertar un nuevo registro con parámetros
    $sql_agregar = 'INSERT INTO color(color, descripcion) VALUES (?, ?)';

    // Preparar la consulta de inserción
    $gagre = $miPDO->prepare($sql_agregar);

    // Ejecutar la consulta con los valores proporcionados
    $gagre->execute([$color, $descripcion]);

    // Redirigir al usuario a 'Pagina.php' para actualizar la lista
    header('Location: Pagina.php');

    // Finalizar la ejecución del script después de la redirección
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Establecer la codificación de caracteres -->
    <meta charset="UTF-8">
    <!-- Título de la página -->
    <title>Lista de Colores</title>
    <style>
        /* Estilos para la tabla */
        table {
            /* Unir los bordes de las celdas para que aparezcan como una sola línea */
            border-collapse: collapse;
            /* Ancho de la tabla al 100% del contenedor */
            width: 100%;
        }
        /* Estilos para la tabla, encabezados y celdas */
        table, th, td {
            /* Agregar un borde de 1px sólido y negro */
            border: 1px solid black;
        }
        /* Estilos para los encabezados y celdas */
        th, td {
            /* Agregar un relleno interno de 5px */
            padding: 5px;
            /* Alinear el texto a la izquierda */
            text-align: left;
        }
        /* Estilos opcionales para el formulario */
        form {
            /* Margen superior de 20px para separar el formulario de la tabla */
            margin-top: 20px;
        }
        label {
            /* Mostrar cada etiqueta en una nueva línea */
            display: block;
            /* Margen superior de 10px entre las etiquetas */
            margin-top: 10px;
        }
        input[type="text"] {
            /* Ancho de los campos de texto */
            width: 200px;
            /* Relleno interno de los campos de texto */
            padding: 5px;
        }
        input[type="submit"] {
            /* Margen superior antes del botón */
            margin-top: 15px;
            /* Relleno interno del botón */
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <!-- Título principal de la página -->
    <h1>Lista de Colores</h1>

    <!-- Tabla para mostrar los colores -->
    <table>
        <tr>
            <!-- Encabezado de la columna 'Color' -->
            <th>Color</th>
            <!-- Encabezado de la columna 'Descripción' -->
            <th>Descripción</th>
        </tr>
        <!-- Iniciar un bucle para recorrer cada resultado obtenido -->
        <?php foreach ($resultado as $result): ?>
            <tr>
                <!-- Mostrar el valor del campo 'color', escapando caracteres especiales -->
                <td><?php echo htmlspecialchars($result['color'], ENT_QUOTES, 'UTF-8'); ?></td>
                <!-- Mostrar el valor del campo 'descripcion', escapando caracteres especiales -->
                <td><?php echo htmlspecialchars($result['descripcion'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <!-- Finalizar el bucle -->
        <?php endforeach; ?>
    </table>

    <!-- Sección para agregar un nuevo color -->
    <h2>Agregar Nuevo Color</h2>
    <!-- Formulario para enviar nuevos datos -->
    <form action="" method="post">
        <!-- Etiqueta y campo de entrada para 'Color' -->
        <label for="color">Color:</label>
        <input type="text" name="color" id="color" required>

        <!-- Etiqueta y campo de entrada para 'Descripción' -->
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" required>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
