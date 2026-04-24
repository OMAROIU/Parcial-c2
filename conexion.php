<?php
// mysqli

$host = "localhost";
$user = "root";
$pass = "Omargarcia2002";
$base = "farmacia_db"; 

$conexion = new mysqli($host, $user, $pass, $base);

if ($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}else{
    echo "conexion exitosa";
}

$conexion->set_charset("utf8mb4");
?>