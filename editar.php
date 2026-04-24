<?php
include("conexion.php");

$id = $_GET['id'];

$datos = $conexion->query("SELECT * FROM pacientes WHERE id='$id'");
$fila = $datos->fetch_assoc();

if($_POST){

$nombre=$_POST['nombre'];
$edad=$_POST['edad'];
$genero=$_POST['genero'];
$telefono=$_POST['telefono'];
$tipo=$_POST['tipo'];

$conexion->query("UPDATE pacientes SET
nombre='$nombre',
edad='$edad',
genero='$genero',
telefono='$telefono',
tipo_sangre='$tipo'
WHERE id='$id'");

header("Location: agregar.php");
}
?>

<link rel="stylesheet" href="css/estilos.css">

<div class="contenedor">

<h1>✏ Editar Paciente</h1>

<form method="POST" class="formulario">

<input type="text" name="nombre" value="<?= $fila['nombre']; ?>" required>

<input type="number" name="edad" value="<?= $fila['edad']; ?>" required>

<select name="tipo">
<option <?= $fila['tipo_sangre']=="O+"?"selected":""; ?>>O+</option>
<option <?= $fila['tipo_sangre']=="A+"?"selected":""; ?>>A+</option>
<option <?= $fila['tipo_sangre']=="B+"?"selected":""; ?>>B+</option>
<option <?= $fila['tipo_sangre']=="AB+"?"selected":""; ?>>AB+</option>
</select>

<input type="text" name="telefono" value="<?= $fila['telefono']; ?>">

<div class="radio-box">
<label>
<input type="radio" name="genero" value="Masculino"
<?= $fila['genero']=="Masculino"?"checked":""; ?>>
Masculino
</label>

<label>
<input type="radio" name="genero" value="Femenino"
<?= $fila['genero']=="Femenino"?"checked":""; ?>>
Femenino
</label>
</div>

<button type="submit">💾 Guardar Cambios</button>

</form>

</div>