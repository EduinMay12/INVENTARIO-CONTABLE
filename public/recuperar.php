<?php

define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'inventario-contable'.DIRECTORY_SEPARATOR); 

    // Include config file
    require_once(_RAIZ.'core/loader.php');
    require_once(_RAIZ.'vendor/PHPMailer-master/PHPMailerAutoload.php'); 

    // define email variable and set to empty value
    $reset_code = $is_active = $email = $emailErr = "";

    $count = 0;
    $msg = '';

    //Submitting the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $email = test_input($_POST["email"]);
        
        //Validating our email
        if (empty($_POST["email"])) {
            $emailErr = "correo electronico es requerido";
            $count++;
        } else {
            $email = test_input($_POST["email"]);
            
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Formato de correo inválido";
                $count++;
            } else {
                //check if email exist
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = $conn->query($sql);
                
                if ($result->num_rows == 0) {
                    $emailErr = "El correo electrónico no encontrado";
                    $email = "";
                    $count++;
                } else {
                    //Store the is_active and reset_code variable for the email use
                    $row = $result->fetch_assoc();
                    $is_active = $row['is_active'];
                    $reset_code = $row['reset_code'];
                }
            }
        }
        
        //If we are free of errors
        if ($count == 0){
            //If account is verified
            if($is_active == 1) {
                //Generate a unique code
                $reset_code = md5(crypt(rand(), 'aa'));
                //Update the database delete password and insert the new reset_code
                $sql = "UPDATE users SET password = '', reset_code = '$reset_code' WHERE email = '$email'";
                
                if ($conn->query($sql) === TRUE) {
                    
                    $msg = 'Hizo una solicitud de contraseña, consulte el correo electrónico para restablecer su contraseña';

                    $message = "Solicitaste un restablecimiento de contraseña. Haga clic en el enlace de abajo para restablecer su contraseña. <br><br> 
                    <a href='http://ejemplo.cipal.com.mx/public/process/p_reset_password.php?code=$reset_code'> Haga click aquí para restablecer la contraseña</a>";

                    //sending email to the user
                    send_mail($email, $message);

                    $email = $emailErr = "";
                    
                } else {
                    echo "Error al actualizar el registro: " . $conn->error;
                }
                
            } else {
                //Update the database delete the password only
                $sql = "UPDATE users SET password = '' WHERE email = '$email'";
                if ($conn->query($sql) === TRUE) {
                    $msg = 'Hizo una solicitud de contraseña, consulte el correo electrónico para restablecer su contraseña';
                    
                    $message = "Solicitaste un restablecimiento de contraseña. Haga clic en el enlace de abajo para restablecer su contraseña <br><br> 
                    <a href='http://ejemplo.cipal.com.mx/public/process/p_reset_password.php?code=$reset_code'> Haga click aquí para restablecer la contraseña</a>";
                    
                    //sending email to the user
                    send_mail($email, $message);

                    $email = $emailErr = "";
                    
                } else {
                    echo "Error al actualizar el registro:" . $conn->error;
                }
            }
        }
    }// End of IF
?>

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
            .btn-gradient-02, .btn-gradient-02 a {
                background: #5d5386;
                background: linear-gradient(to right, #1f2965 0%, #4f59ff 100%);
                background-size: 200% auto;
                font-weight: 600;
                transition: 0.5s;
                color: #fff;
                border: 0 none;
                padding: 12px 20px;
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
                        <h2>Recuperar contraseña</h2>

                        <?php 
                            if($msg != ''){
                                echo '<div class="alert bg-gradient-01 alert-dissmissible fade show" role="alert">';
                                echo  $msg;
                                echo '</div>';
                            }
                        ?>
                        <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="form-group">
                                <label>Correo Electronico</label>
                                <input type="email" name="email" class="form-control">
                                <span class="help-block text-red"><?php echo $emailErr; ?></span>
                            </div>    

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-gradient-02">Cambiar contraseña</button>
                                <a type="reset" href="login.php" class="btn btn-lg btn-gradient-05" > Volver</a>
                            </div>
                        </form>
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
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script src="../assets/js/smoothproducts.min.js"></script>
        <script src="../assets/js/theme.js"></script>
    </body>
</html>

