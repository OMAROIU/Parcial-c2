<?php
session_start();
include("conexion.php");

if($_POST){

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = $conexion->query("SELECT * FROM usuarios 
WHERE usuario='$usuario' AND clave='$clave'");

if($sql->num_rows > 0){

$_SESSION['usuario'] = $usuario;
header("Location: dashboard.php");

}else{
echo "Datos incorrectos";
}

}
?>

<link rel="stylesheet" href="css/estilos.css">

<div class="contenedor">

<form method="POST">

<input type="text" name="usuario" placeholder="Usuario" required>

<input type="password" name="clave" placeholder="Clave" required>

<button type="submit">Ingresar</button>

</form>

</div>