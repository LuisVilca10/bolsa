<?php
session_start();
include("../includes/conectar.php");
date_default_timezone_set('America/Lima');

$conexion = conectar();
$user = $_SESSION["S_id"];
$oferta = $_GET['id'];
$fecha = date('Y-m-d H:i:s');



$sql = "INSERT INTO postulaciones (id_user,id_oferta,fecha_hora_postulacion,estado_actual) VALUES('$user','$oferta','$fecha','En proceso') ";

mysqli_query($conexion, $sql) or die("Error al guardar.");


header("location: exito.php");
