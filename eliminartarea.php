<?php
include 'conexion.php';
$Clave = $_GET['id'];

$Delete = "DELETE FROM tareas WHERE id=$Clave";
$con->query($Delete);
$con->close();
header('Location:index.php');