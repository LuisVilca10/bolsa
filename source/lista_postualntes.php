<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lista de tus Postulantes</h1>
    <!-- Inicio Zona  central del sistema  -->
    <?php

    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Postulantes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre Postulante</th>
                            <th>Oferta a postuar</th>
                            <th>Fecha Postualación</th>
                            <th>Limete de postulantes</th>
                            <th>Estado de la oferta</th>
                            <th>Remuneración</th>
                            <!-- Numero de asignacio  -->
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            // $empresa = $_SESSION['S_ASIG'];
                            // if ($_SESSION["S_ROL"] == 3) {
                            $goku = "SELECT * FROM postulaciones";
                            // } else {
                            //     $goku = "SELECT * FROM postulaciones WHERE id_empresa = $empresa ";
                            // }
                            $lista = mysqli_query($conexion, $goku);
                            $usuario = null;
                            $oferta = null;
                            //echo "<table>"; 
                            while ($fila = mysqli_fetch_array($lista)) {
                                $id_usuario = $fila['id_user'];
                                $sql = "SELECT * FROM usuarios WHERE id= $id_usuario";
                                $resultado = mysqli_query($conexion, $sql);
                                if ($resultado && mysqli_num_rows($resultado) > 0) {
                                    $usuario = mysqli_fetch_assoc($resultado);
                                } else {
                                    $usuario = null;
                                }
                                $id_oferta = $fila['id_oferta'];
                                $sqloferta = "SELECT * FROM oferta_laboral WHERE id= $id_oferta";
                                $resultadooferta = mysqli_query($conexion, $sqloferta);
                                if ($resultadooferta && mysqli_num_rows($resultadooferta) > 0) {
                                    $oferta = mysqli_fetch_assoc($resultadooferta);
                                } else {
                                    $oferta = null;
                                }
                                echo "<tr>";
                                echo "<td>" . $usuario["nombre"] . " " . $usuario["apellidos"] . "</td>";
                                echo "<td>" . $oferta["titulo"] . "</td>";
                                echo "<td>" . $fila["fecha_hora_postulacion"] . "</td>";
                                echo "<td>" . $oferta["limite_postulantes"] . "</td>";
                                echo "<td>" . $fila["estado_actual"] . "</td>";
                                echo "<td>" . $oferta["remuneración"] . "</td>";
                                echo "<td>";  ?>
                                <?php
                                if ($_SESSION["S_ASIG"] == $oferta["id_empresa"]) {
                                ?>
                                    <button class="btn btn-success" onclick="postular_trabajo('<?php echo $fila['id'] ?>')">Ver Detalles</button>
                                    <button class="btn btn-primary" onclick="delete_sayayin('<?php echo $fila['id'] ?>')"> Aceptar</button>
                                    <button class="btn btn-danger" onclick="editar_sayayin('<?php echo $fila['id'] ?>')">Denegar</button>
                                <?php
                                }
                                ?>



                            <?php "</td>";
                                echo "</tr>";
                            }
                            //echo "</table>"; 
                            ?>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>


<script>
    function editar_sayayin(id) {
        //redirect
        location.href = "editar_oferta.php?id=" + id;
    }

    function delete_sayayin(id) {
        location.href = "eliminar_oferta.php?id=" + id;
    }

    function postular_trabajo(id) {
        location.href = "registrar_postulacion.php?id=" + id;
    }
</script>