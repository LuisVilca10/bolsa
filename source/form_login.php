<?php
include("../includes/head.php");
?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="login.php">
                                    <div class="form-group">
                                        <input type="user" class="form-control form-control-user" name="txt_usuario" placeholder="Usuario...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Contraseña..." class="form-control form-control-user" name="txt_password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                  
                                    <?php
                                    if (isset($_REQUEST['error'])) {
                                        echo "<div class='alert alert-danger' role='alert'>Nombre de usuario o contraseña incorrectos.</div>";
                                    }               
                                    ?>
                                </form>
                                <hr>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php
include("../includes/foot.php");
?>