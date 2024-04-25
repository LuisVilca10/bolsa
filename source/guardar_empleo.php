<?php

include("../includes/conectar.php");

$conexion = conectar();



//Recibimos datos del formulario
$ide = $_POST['ide'];
$tit = $_POST['txt_titulo'];
$des = $_POST['txt_descri'];
$fec = $_POST['txt_fecomi'];
$feci = $_POST['txt_feci'];
$remu = $_POST['txt_remu'];
$ubi = $_POST['txt_ubi'];
$tipo = $_POST['txt_tipo'];
$lime = $_POST['txt_postu'];


/*
    echo "DNI recibido: ".$dni;
    echo "nombres recibido: ".$nombres;
    echo "apellidos recibido: ".$apellidos;
    echo "direccion recibido: ".$direccion;
    echo "telefono recibido: ".$telefono;
    */
//conexion a la DB
//gurdamos datos en tabla usuarios

$sql = "INSERT INTO oferta_laboral (id_empresa,titulo,descripción,fecha_publicación, fecha_cierre, remuneración, ubicación, tipo, limite_postulantes) VALUES('$ide',
'$tit',
'$des',
'$fec',
'$feci',
'$remu',
'$ubi',
'$tipo',
'$lime') ";

mysqli_query($conexion, $sql) or die("Error al guardar.");

header("location: listar_oferta.php");
