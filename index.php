<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pacientes Registrados</title>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">

<h1>📋 Pacientes Registrados</h1>

<div style="text-align:center; margin-bottom:20px;">
<a href="login.php" class="boton-secundario">🔐 Iniciar Sesión</a>
</div>

<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Edad</th>
<th>Genero</th>
<th>Tipo Sangre</th>
<th>Fecha Registro</th>
</tr>

<?php
$sql = $conexion->query("SELECT * FROM pacientes ORDER BY id DESC");

while($fila = $sql->fetch_assoc()){
?>

<tr>
<td><?= $fila['id']; ?></td>
<td><?= $fila['nombre']; ?></td>
<td><?= $fila['edad']; ?></td>
<td><?= $fila['genero']; ?></td>
<td><?= $fila['tipo_sangre']; ?></td>
<td><?= date("d/m/Y h:i A", strtotime($fila['fecha_registro'])); ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>