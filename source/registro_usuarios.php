<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<?php
include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<h1>Registro de Usuarios Nuevos </h1>
    <!-- Inicio Zona  central del sistema  -->


<form class="row g-3" method="POST" action="guardar_usuario.php">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nombre</label>
            <input type="text" name="txt_nombres" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Apellidos</label>
            <input type="text" name="txt_apellidos" class="form-control" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">DNI</label>
            <input type="number" name="txt_dni" class="form-control" id="inputAddress" >
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Telefono</label>
            <input type="number" name="txt_teléfono" class="form-control" id="inputAddress2"  >
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label"> Dirección</label>
            <input type="text" name="txt_direccion" class="form-control" id="inputCity" >
        </div>
        <div class="col-md-6">
            <label for="inputZip" class="form-label">Usuario</label>
            <input type="text" name="txt_usuario" class="form-control" id="inputZip" >
        </div>

        <div class="col-md-6">
            <label for="inputZip" class="form-label">Contraseña</label>
            <input type="text" name="txt_contraseña" class="form-control" id="inputZip">
        </div>

        <div class="col-md-12">
            <label for="inputZip" class="form-label"></label>
        </div>

        <div class="col-12 ">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>





    <!-- Fin Zona  central del sistema  -->


</div>
<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>