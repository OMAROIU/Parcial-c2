<?php
session_start();

if(!isset($_SESSION['usuario'])){
header("Location: login.php");
exit();
}
?>

<link rel="stylesheet" href="css/estilos.css">

<div class="panel">

<div class="encabezado">
    <h1>🏥 Panel Principal</h1>
    <p>Bienvenido: <strong><?= $_SESSION['usuario']; ?></strong></p>
</div>

<div class="tarjetas">

<a href="agregar.php" class="card verde">
    <h2>➕ Agregar Paciente</h2>
    <p>Registrar nuevos pacientes al sistema</p>
</a>

<a href="index.php" class="card azul">
    <h2>📋 Ver Pacientes</h2>
    <p>Consultar pacientes registrados</p>
</a>

<a href="logout.php" class="card rojo">
    <h2>🚪 Cerrar Sesión</h2>
    <p>Salir del sistema actual</p>
</a>

</div>

<div class="info">
<h3>Sistema Farmacia La Buena</h3>
<p>Administra pacientes de forma rápida y sencilla.</p>
</div>

</div>