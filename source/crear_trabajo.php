<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<?php
include("../includes/head.php");


?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1>Registro de Nueva Oferta Laboral </h1>
    <!-- Inicio Zona  central del sistema  -->


    <form class="row g-3" method="POST" action="guardar_empleo.php">
        <input type="hidden" name="ide" value="<?php echo $_SESSION['S_ASIG'] ?>">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Titulo</label>
            <input type="text" name="txt_titulo" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Descripción</label>
            <input type="text" name="txt_descri" class="form-control">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Fecha Comienzo:</label>
            <input type="text" name="txt_fecomi" class="form-control" id="inputAddress">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Fecha de Cierre:</label>
            <input type="text" name="txt_feci" class="form-control" id="inputAddress2">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label"> Remuneración:</label>
            <input type="text" name="txt_remu" class="form-control" id="inputCity">
        </div>
        <div class="col-md-6">
            <label for="inputZip" class="form-label">Ubicación:</label>
            <input type="text" name="txt_ubi" class="form-control" id="inputZip">
        </div>

        <div class="col-md-6">
            <label for="inputZip" class="form-label">Tipo:</label>
            <input type="text" name="txt_tipo" class="form-control" id="inputZip">
        </div>

        <div class="col-md-6">
            <label for="inputZip" class="form-label">Limite de postulantes:</label>
            <input type="text" name="txt_postu" class="form-control" id="inputZip">
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
<?php
include("../includes/foot.php");
?>