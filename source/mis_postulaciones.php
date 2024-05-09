<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo "Tu lista de postulaciones " . $_SESSION['S_NOM'] . " " . $_SESSION['S_APE']; ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Titulo de Oferta</th>
                            <th>Estado</th>
                            <th>Fecha de Postulacion</th>
                            <th>Fecha de Cierre</th>
                            <th>Remuneración</th>
                            <th>Ubicación</th>
                            <th>Tipo</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $iduser = $_SESSION["S_id"];
                            $ofertas = null;
                            $empresas = null;
                            $psotu = "SELECT * FROM postulaciones WHERE id_user = $iduser ";
                            $lista = mysqli_query($conexion, $psotu);
                            while ($fila = mysqli_fetch_array($lista)) {
                                $id_oferta = $fila["id_oferta"];
                                $sqloferta = "SELECT * FROM oferta_laboral WHERE id = $id_oferta";
                                $listaoferta = mysqli_query($conexion, $sqloferta);
                                if ($listaoferta && mysqli_num_rows($listaoferta) > 0) {
                                    $ofertas = mysqli_fetch_assoc($listaoferta);
                                } else {
                                    $ofertas = null;
                                }
                                $id_empresa = $ofertas["id_empresa"];
                                $sqlempresa = "SELECT * FROM empresa WHERE id=$id_empresa";
                                $listaempresa = mysqli_query($conexion, $sqlempresa);
                                if ($listaempresa && mysqli_num_rows($listaempresa) > 0) {
                                    $empresas = mysqli_fetch_assoc($listaempresa);
                                } else {
                                    $empresas = null;
                                }

                                echo "<tr>";
                                echo "<td>" . $empresas["razón_social"] . "</td>";
                                echo "<td>" . $ofertas["titulo"] . "</td>";
                                echo "<td>" . $fila["estado_actual"] . "</td>";
                                echo "<td>" . $fila["fecha_hora_postulacion"] . "</td>";
                                echo "<td>" . $ofertas["fecha_cierre"] . "</td>";
                                echo "<td>" . $ofertas["remuneración"] . "</td>";
                                echo "<td>" . $ofertas["ubicación"] . "</td>";
                                echo "<td>" . $ofertas["tipo"] . "</td>";
                                echo "<td>" . "a sido ganador, rechazado" . "</td>";
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
<?php
include("../includes/foot.php");
?>