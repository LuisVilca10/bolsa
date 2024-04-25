<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lista de empresas</h1>
    <!-- Inicio Zona  central del sistema  -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Empresas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Razón Social</th>
                            <th>RUC</th>
                            <th>Dirección</th>
                            <th>Telefóno</th>
                            <th>Correo</th>
                            <th>Usuario a cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $goku = "SELECT * FROM empresa";
                            $lista = mysqli_query($conexion, $goku);
                            $usuario = null;

                            //echo "<table>"; 
                            while ($fila = mysqli_fetch_array($lista)) {
                                $id_usuario = $fila['id_usuario'];

                                $sql = "SELECT * FROM usuarios WHERE  id= $id_usuario";
                                $resultado = mysqli_query($conexion, $sql);
                                if ($resultado && mysqli_num_rows($resultado) > 0) {
                                    $usuario = mysqli_fetch_assoc($resultado);
                                } else {
                                    $usuario = null;
                                }
                                echo "<tr>";
                                echo "<td>" . $fila["razón_social"] . "</td>";
                                echo "<td>" . $fila["ruc"] . "</td>";
                                echo "<td>" . $fila["dirección"] . "</td>";
                                echo "<td>" . $fila["teléfono"] . "</td>";
                                echo "<td>" . $fila["correo"] . "</td>";


                                if ($usuario !== null) {
                                    echo "<td>" .  $usuario["nombre"] . "</td>";
                                } else {
                                    echo "<td>No disponible</td>";
                                }


                                echo "<td>"; ?><button class="btn btn-primary" onclick="editar_sayayin('<?php echo $fila['id'] ?>')"><i class="fas fa-edit"></i>Editar</button>
                                <button class="btn btn-danger" onclick="delete_sayayin('<?php echo $fila['id'] ?>', '<?php echo $fila['id_usuario'] ?>')"> <i class="fas fa-trash"></i>Elimar</button>
                                <?php if ($fila['id_usuario'] == 0 || $fila['id_usuario'] == null) { ?>
                                    <button class="btn bg-gradient-success" style="color: white" onclick="f_mostraruser(<?php echo $fila['id']; ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                        </svg>Asignar
                                    </button>
                                <?php } ?>
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
    var EMPRESA_ID;
    $(document).ready(function() { //inicio jquery
        $(div_usuarios).dialog({
            autoOpen: false,
            width: 600,
            height: 400,
            title: "Lista de Usuarios...",

        });
        $(div_usuarios).dialog(close);
    });

    function f_mostraruser(id) {
        EMPRESA_ID = id;
        //redirect
        $("#div_usuarios").dialog("open");

    }

    function editar_sayayin(id) {
        //redirect
        location.href = "editar_empresa.php?id=" + id;


    }

    function f_asignar(id) {
        location.href = "asignarempresa.php?id=" + id + "&ide=" + EMPRESA_ID;
    }

    function delete_sayayin(id, ideu) {
        location.href = "eliminar_empresa.php?id=" + id + "&ideu=" + ideu;
    }
</script>

<div id="div_usuarios">
    <h2 style="font: bold; text-align: center;">Lista de Usuarios sin Empresas Asignadas</h2>
    <?php
    $sql_usuarios = "SELECT * FROM usuarios WHERE asignado=0 OR asignado IS NULL";
    $registro_usuarios = mysqli_query($conexion, $sql_usuarios);
    while ($fila_user = mysqli_fetch_array($registro_usuarios)) {
        echo '<a style="cursor: pointer; " onclick="f_asignar(' . $fila_user["id"] . ')">';
        echo $fila_user["dni"] . " " . $fila_user["nombre"] . " " . $fila_user["apellidos"] . "<br>";
        echo '</a>';
    }

    ?>

</div>