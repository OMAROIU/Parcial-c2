<?php
include("conexion.php");

$id = $_GET['id'];

$conexion->query("DELETE FROM pacientes WHERE id='$id'");

header("Location: agregar.php");
?>