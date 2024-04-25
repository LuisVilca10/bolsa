<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lista de Ofertas</h1>
    <!-- Inicio Zona  central del sistema  -->

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
                            $goku = "SELECT * FROM oferta_laboral";
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
                                echo "<tr>";
                                echo "<td>" .  $usuario["razón_social"] . "</td>";
                                echo "<td>" . $fila["titulo"] . "</td>";
                                echo "<td>" . $fila["descripción"] . "</td>";
                                echo "<td>" . $fila["fecha_publicación"] . "</td>";
                                echo "<td>" . $fila["fecha_cierre"] . "</td>";
                                echo "<td>" . $fila["remuneración"] . "</td>";
                                echo "<td>" . $fila["ubicación"] . "</td>";
                                echo "<td>" . $fila["tipo"] . "</td>";
                                echo "<td>" . $fila["limite_postulantes"] . "</td>";

                                echo "<td>";  ?><button class="btn btn-primary" onclick="editar_sayayin('<?php echo $fila['id'] ?>')"><i class="fas fa-edit"></i></button> <button class="btn btn-danger" onclick="delete_sayayin('<?php echo $fila['id'] ?>')"> <i class="fas fa-trash"></i></button>


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
</script>