<?php
include("../includes/head.php");
?>

<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    if ($_SESSION['S_ROL'] == 3 || $_SESSION['S_ROL'] == 1) {
    ?>
        <div class="col-md-6">
            <h1>Estas en una cuenta que no es empresa</h1>
        </div>
    <?php
    } else {
    ?>

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
                <input type="date" name="txt_fecomi" class="form-control" id="inputAddress">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Fecha de Cierre:</label>
                <input type="date" name="txt_feci" class="form-control" id="inputAddress2">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label"> Remuneración:</label>
                <input type="number" name="txt_remu" class="form-control" id="inputCity">
            </div>
            <div class="col-md-6">
                <label for="inputZip" class="form-label">Ubicación:</label>
                <input type="text" name="txt_ubi" class="form-control" id="inputZip">
            </div>

            <div class="col-md-6">
            <label for="inputCity" class="form-label"> Tipo</label>
            <select name="txt_tipo" id="tipo" class="form-control">
                <option value="presencial">Presencial</option>
                <option value="remoto">Remoto</option>
            </select>

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
    <?php
    }
    ?>



</div>
<?php
include("../includes/foot.php");
?>