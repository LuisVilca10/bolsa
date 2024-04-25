<?php
include("../includes/conectar.php");

    $id = $_REQUEST['id'];
 
    $conexion = conectar();


    $sql = "UPDATE usuarios SET id_rol='3' WHERE id=$id";

    if (mysqli_query($conexion, $sql)) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar usuario: " . mysqli_error($conexion);
    }


header("location: listar_usuarios.php");
