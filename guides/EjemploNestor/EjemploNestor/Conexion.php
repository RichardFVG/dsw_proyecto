<?php
//Variables
$hostDB = '127.0.0.1';
$nombreDB = 'colores';
$usuarioDB = 'root';
$contraDB = '';

//Establecer conexion
$link = "mysql:host=$hostDB;dbname=$nombreDB";

try{
$miPDO = new PDO($link,$usuarioDB,$contraDB);

}catch(PDOException $e){
    echo "¡Error!" . $e->getMessage() . "<br>";
}

?>