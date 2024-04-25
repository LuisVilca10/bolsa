<?php
include("includes/head.php");

?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Inicio Zona  central del sistema  -->

    <?php 
 
        if (isset($_REQUEST['noauto'])) {
            echo "<div class='alert alert-danger' role='alert'>Usuario No Autorizado</div>";
        } 
        if (isset($_REQUEST['userregis'])) {
            echo "<div class='alert alert-danger' role='alert'>Espere un momento, usuario sin priviligio</div>";
        } 
    ?>



    <!-- Fin Zona  central del sistema  -->


</div>
<!-- /.container-fluid -->
<?php
include("includes/foot.php");
?>


