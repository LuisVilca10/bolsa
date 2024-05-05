<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Listar Usuario</h1>
        <div class="d-sm-flex align-items-center justify-flex-arround mb-4">
            <label href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mx-4 mt-2">Filtrar por:</label>
            <select name="" id="rol" onchange="filtrarUsuarios()">
                <option value=" ">Todos</option>
                <option value="1">Administrador</option>
                <option value="2">Empresario</option>
                <option value="3">Postulante</option>
            </select>
        </div>


    </div>
    <!-- Inicio Zona  central del sistema  -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Dirección</th>
                            <th>Telefóno</th>
                            <th>Usuarios</th>
                            <th>Empresa</th>
                            <th>Autorizado</th>
                            <th>Tipo Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $goku = "SELECT * FROM usuarios";
                            $lista = mysqli_query($conexion, $goku);
                            $usuario = null;
                            //echo "<table>"; 
                            while ($fila = mysqli_fetch_array($lista)) {
                                $id_empresa = $fila['asignado'];
                                $sql = "SELECT * FROM empresa WHERE id = $id_empresa";
                                $resultado = mysqli_query($conexion, $sql);
                                if ($resultado && mysqli_num_rows($resultado) > 0) {
                                    $usuario = mysqli_fetch_assoc($resultado);
                                } else {
                                    $usuario = null;
                                }
                                echo "<tr>";
                                echo "<td>" . $fila["nombre"] . "</td>";
                                echo "<td>" . $fila["apellidos"] . "</td>";
                                echo "<td>" . $fila["dni"] . "</td>";
                                echo "<td>" . $fila["dirección"] . "</td>";
                                echo "<td>" . $fila["teléfono"] . "</td>";
                                echo "<td>" . $fila["usuario"] . "</td>";
                                if ($usuario != null || $usuario != 0) {
                                    echo "<td>" .  $usuario["razón_social"] . "</td>";
                                } else {
                                    echo "<td>No disponible</td>";
                                }

                                if ($fila["id_rol"] == '0') {
                                    echo "<td>NO</td>";
                                } else {
                                    echo "<td>SI</td>";
                                }

                                if ($fila["id_rol"] == '1') {
                                    echo "<td>Administrador </td>";
                                } elseif ($fila["id_rol"] == '2') {
                                    echo "<td>Empresa</td>";
                                } elseif ($fila["id_rol"] == '3') {
                                    echo "<td>Postulante</td>";
                                } else {
                                    echo "<td>Nada</td>";
                                }
                                echo "<td>";  ?><button class="btn btn-primary" onclick="editar_sayayin('<?php echo $fila['id'] ?>')"><i class="fas fa-edit"></i></button> <button class="btn btn-danger" onclick="delete_sayayin('<?php echo $fila['id'] ?>')"> <i class="fas fa-trash"></i></button>

                                <?php
                                if ($fila['id_rol'] == 0) {
                                ?><button class="btn btn-success" onclick="auto_sayayin('<?php echo $fila['id'] ?>')"><i class="fas fa-user"></i></button>

                                <?php
                                } else {
                                ?>
                                    <!-- <button class="btn btn-success" onclick="auto_sayayin('')"><i class="fas fa-edit"></i></button> -->
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
        location.href = "editar_usuario.php?id=" + id;
    }

    function delete_sayayin(id) {
        location.href = "eliminar_usuario.php?id=" + id;
    }

    function auto_sayayin(id) {
        if (confirm("Autorizar usuario como empleado")) {
            location.href = "auto_usuario.php?id=" + id;
        } 
    }

    function filtrarUsuarios() {
        var rol = document.getElementById("rol").value;
        location.href = "filtrar_usuarios.php?rol=" + rol;
 
    }
</script>