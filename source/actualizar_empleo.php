<?php
include("../includes/conectar.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió un ID válido
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        // Recuperar los datos del formulario
        $ide = $_POST['ide'];
        $tit = $_POST['txt_titulo'];
        $des = $_POST['txt_descri'];
        $fec = $_POST['txt_fecomi'];
        $feci = $_POST['txt_feci'];
        $remu = $_POST['txt_remu'];
        $ubi = $_POST['txt_ubi'];
        $tipo = $_POST['txt_tipo'];
        $lime = $_POST['txt_postu'];


        $conexion = conectar();

        $sql = "UPDATE oferta_laboral SET id_empresa='$ide', titulo=' $tit', descripción='$des', fecha_publicación='$fec', fecha_cierre='$feci', remuneración='$remu', ubicación ='$ubi'
        tipo ='$tipo'
        limite_postulantes='$lime'  WHERE id=$id";

        if (mysqli_query($conexion, $sql)) {
            echo "Empresa actualizado correctamente.";
        } else {
            echo "Error al Empresa usuario: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    } else {
        echo "ID de empresa no válido.";
    }
} else {
    echo "Solicitud no válida.";
}



header("location: listar_oferta.php");