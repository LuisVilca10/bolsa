<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lista de <?php if ($_SESSION["S_ROL"] == 2) {
                                                ?> tus
        <?php  } ?> Ofertas</h1>
    <!-- Inicio Zona  central del sistema  -->
    <?php

    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Ofertas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Titulo de empleo</th>
                            <th>Breve Descripción</th>
                            <th>Fecha Comienzo</th>
                            <th>Fecha de Cierre</th>
                            <th>Remuneración</th>
                            <th>Ubicación</th>
                            <th>Tipo</th>
                            <th>Limite de postulantes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $empresa = $_SESSION['S_ASIG'];
                            if ($_SESSION["S_ROL"] == 3 || $_SESSION["S_ROL"] == 1) {
                                $goku = "SELECT * FROM oferta_laboral";
                            } else {
                                $goku = "SELECT * FROM oferta_laboral WHERE id_empresa = $empresa ";
                            }
                            $lista = mysqli_query($conexion, $goku);
                            $usuario = null;
                            //echo "<table>"; 
                            while ($fila = mysqli_fetch_array($lista)) {

                                $id_empresa = $fila['id_empresa'];
                                $sql = "SELECT * FROM empresa WHERE id= $id_empresa";
                                $resultado = mysqli_query($conexion, $sql);
                                if ($resultado && mysqli_num_rows($resultado) > 0) {
                                    $usuario = mysqli_fetch_assoc($resultado);
                                } else {
                                    $usuario = null;
                                }
                                $iduser = $_SESSION["S_id"];
                                $veri = "SELECT id_oferta  FROM postulaciones WHERE id_user = $iduser";
                                $pstu = mysqli_query($conexion, $veri);
                                $ofertas_postuladas = array();
                                while ($fila_postulada = mysqli_fetch_assoc($pstu)) {
                                    $ofertas_postuladas[] = $fila_postulada['id_oferta'];
                                }
                                echo "<tr>";
                                echo "<td>" . $usuario["razón_social"] . "</td>";
                                echo "<td>" . $fila["titulo"] . "</td>";
                                echo "<td>" . $fila["descripción"] . "</td>";
                                echo "<td>" . $fila["fecha_publicación"] . "</td>";
                                echo "<td>" . $fila["fecha_cierre"] . "</td>";
                                echo "<td>" . $fila["remuneración"] . "</td>";
                                echo "<td>" . $fila["ubicación"] . "</td>";
                                echo "<td>" . $fila["tipo"] . "</td>";
                                echo "<td>" . $fila["limite_postulantes"] . "</td>";

                                echo "<td>";  ?>
                                <?php
                                if ($_SESSION["S_ASIG"] == $fila["id_empresa"]) {
                                ?>
                                    <button class="btn btn-primary" onclick="editar_sayayin('<?php echo $fila['id'] ?>')"><i class="fas fa-edit"></i></button>
                                <?php
                                }
                                ?>
                                <?php
                                if ($_SESSION["S_ASIG"] == $fila["id_empresa"]) {
                                ?>
                                    <button class="btn btn-danger" onclick="delete_sayayin('<?php echo $fila['id'] ?>')"> <i class="fas fa-trash"></i></button>
                                <?php
                                }
                                ?>
                                <?php

                                if (in_array($fila["id"], $ofertas_postuladas)) {
                                ?>
                                    <button>Ya Postulastes</button>
                                <?php
                                } elseif ($_SESSION["S_ROL"] == 3) {
                                ?>
                                    <button class="btn btn-success" onclick="postular_trabajo('<?php echo $fila['id'] ?>')">Postular</button>
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