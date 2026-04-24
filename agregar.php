<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['usuario'])){
header("Location: login.php");
exit();
}

$mensaje = "";

/* GUARDAR PACIENTE */
if(isset($_POST['guardar'])){

$nombre   = $_POST['nombre'];
$edad     = $_POST['edad'];
$genero   = $_POST['genero'];
$telefono = $_POST['telefono'];
$tipo     = $_POST['tipo'];
$fecha    = $_POST['fecha'];

if($fecha==""){
$sql = "INSERT INTO pacientes(nombre,edad,genero,telefono,tipo_sangre,fecha_registro)
VALUES('$nombre','$edad','$genero','$telefono','$tipo',NULL)";
}else{
$sql = "INSERT INTO pacientes(nombre,edad,genero,telefono,tipo_sangre,fecha_registro)
VALUES('$nombre','$edad','$genero','$telefono','$tipo','$fecha')";
}

if($conexion->query($sql)){
$mensaje = "✅ Paciente agregado correctamente";
}else{
$mensaje = "❌ Error al guardar";
}

}

/* LISTAR PACIENTES */
$lista = $conexion->query("SELECT * FROM pacientes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agregar Pacientes</title>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="contenedor">

<h1>➕ Registrar Paciente</h1>

<div style="margin-bottom:15px;">
<a href="dashboard.php" class="boton-secundario">⬅ Volver</a>
</div>

<?php if($mensaje!=""){ ?>
<div class="alerta"><?= $mensaje; ?></div>
<?php } ?>

<form method="POST" class="formulario">

<input type="text" name="nombre" placeholder="Nombre completo" required>

<input type="number" name="edad" placeholder="Edad" required>

<select name="tipo" required>
<option value="">Tipo de sangre</option>
<option>O+</option>
<option>A+</option>
<option>B+</option>
<option>AB+</option>
<option>O-</option>
</select>

<input type="text" name="telefono" placeholder="Telefono">

<input type="datetime-local" name="fecha">

<div class="radio-box">
<label>
<input type="radio" name="genero" value="Masculino" required>
Masculino
</label>

<label>
<input type="radio" name="genero" value="Femenino">
Femenino
</label>
</div>

<button type="submit" name="guardar">💾 Guardar Paciente</button>

</form>

<h2>📋 Pacientes Registrados</h2>

<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Edad</th>
<th>Genero</th>
<th>Telefono</th>
<th>Sangre</th>
<th>Fecha</th>
<th>Acciones</th>
</tr>

<?php while($fila = $lista->fetch_assoc()){ ?>

<tr>

<td><?= $fila['id']; ?></td>
<td><?= $fila['nombre']; ?></td>
<td><?= $fila['edad']; ?></td>
<td><?= $fila['genero']; ?></td>
<td><?= $fila['telefono']; ?></td>
<td><?= $fila['tipo_sangre']; ?></td>

<td>
<?php
if($fila['fecha_registro']==NULL || $fila['fecha_registro']==""){
echo "Sin fecha registrada";
}else{
echo date("d/m/Y h:i A", strtotime($fila['fecha_registro']));
}
?>
</td>

<td>

<a href="editar.php?id=<?= $fila['id']; ?>" class="btn-editar">
✏ Editar
</a>

<a href="eliminar.php?id=<?= $fila['id']; ?>"
class="btn-eliminar"
onclick="return confirm('¿Seguro que deseas eliminar este paciente?')">
🗑 Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>