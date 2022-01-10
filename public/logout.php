<?php 
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

//borramos las cookies();
setcookie("usuarioCookie","", time() - 3600, "/");
setcookie("usuarioToken", "", time() - 3600, "/");
 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Cfactura - Logout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="icon" type="image/png" sizes="92x92" href="../public/img/favicon_.png">
        <link rel="icon" type="image/png" sizes="92x92" href="../public/img/favicon_.png">
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../public/css/base/cfactura.css">
        <style>
            .bg-fixed-02 {
            background: url(../public/img/fondo/card-2.png) no-repeat center center fixed; 
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            z-index: 999999;
            }
            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url("../public/img/fondo/card-2.png") no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                z-index: 999999;
            }
        </style>
    </head>

    <body class="bg-fixed-02">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="../public/img/logo/logo-blanco-actualizado.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid h-100 overflow-y">
            <div class="row flex-row h-100">
                <div class="col-12 my-auto">
                    <div class="mail-confirm mx-auto">
                        <h3>Sesión cerrada con Éxito!</h3>
                            <div class="text-center">
                                <div class="mt-4">
                                    <div class="logout-checkmark">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                            <circle class="path circle" fill="none" stroke="#4bd396" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                                            <polyline class="path check" fill="none" stroke="#4bd396" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                                        </svg>
                                    </div>
                                </div>
                                <h3>¡Sesión Cerrada!</h3>
                            </div>
                        <div class="button text-center">
                            <a href="login.php" class="btn btn-lg btn-gradient-02">
                                ir a Inicio
                            </a>
                        </div>
                    </div>        
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>  
        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
    </body>
</html>