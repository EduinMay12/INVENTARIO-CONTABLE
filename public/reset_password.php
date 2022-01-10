<?php
    session_start();
    
    define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR); 

    // Include config file
    require_once(_RAIZ.'core/loader.php');

    //Get the code from session
    $reset_code = $_SESSION['reset_code'];

    // define variables and set to empty values
    $is_active = $password = $confirm_password = "";
    $passwordErr = $confirm_passwordErr = "";

    $count = 0;
    $msg = '';

    //Submitting the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $password = test_input($_POST["password"]);
        $confirm_password = test_input($_POST["confirm_password"]);
        
        //Validating our password
        if (empty($_POST["password"])) {
            $passwordErr = "Se requiere contraseña";
            $count++;
        } else {
            $password = test_input($_POST["password"]);
        }
        
        //Validating our confirm password
        if (empty($_POST["confirm_password"])) {
            $confirm_passwordErr = "Por favor, confirme su contraseña";
            $count++;
        } else {
            $confirm_password = test_input($_POST["confirm_password"]);
            //Check if passwords match
            if($confirm_password != $password){
                $confirm_passwordErr = "Las contraseñas no coinciden";
                $confirm_password = "";
                $count++;
            } else {
                $confirm_password = test_input($_POST["confirm_password"]);
            }
        }
        
        //If we are free of errors
        if($count == 0){
            //Getting information from user with a proper reset_code
            $sql = "SELECT * FROM users WHERE reset_code = '$reset_code'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                //If the user is verified
                if($row['is_active'] == 1){
                    //hashing the password before inserting it into database
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    
                    //Update the user password and delete the reset code
                    $sql = "UPDATE users SET password = '$hashed_password', reset_code = '' WHERE reset_code = '$reset_code'";
                    
                    if ($conn->query($sql) === TRUE) {
                    $msg = 'Your password has been reset';
                    header("Location: login.php?message=$msg");
                    //Unset the reset_code variable
                    session_unset();
                    exit();
                    } else {
                        echo "Error al actualizar el registro: " . $conn->error;
                    }
                } else {
                    //hashing the password before inserting it into database
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    
                    //Update the user password only
                    $sql = "UPDATE users SET password = '$hashed_password' WHERE reset_code = '$reset_code'";

                    if ($conn->query($sql) === TRUE) {
                        $msg = 'Your password has been reset';
                        header("Location: login.php?message=$msg");
                        //Unset the reset_code variable
                        session_unset();
                        exit();
                    } else {
                        echo "Error al actualizar el registro: " . $conn->error;
                    }
                }
            } else {
                echo "0 resultados";
            }
        }
    }//End of IF
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
                        <h2>Recuperar Contrase単a</h2>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="form-group">
                                <label>Nueva Contase単a</label>
                                <input class="form-control" type="password" name="password" placeholder="Confirma tu Nueva Contrase単a" value="<?php echo $password; ?>">
                                <span class="help-block text-red"><?php echo $passwordErr; ?></span>
                            </div>    
                            
                            <div class="form-group">
                                <label>Correo Electronico</label>
                                <input class="form-control" type="password"  name="confirm_password" placeholder="Confirma tu Contrase単a">
                                <span class="help-block text-red"><?php echo $confirm_passwordErr; ?></span>
                            </div>

                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-lg btn-gradient-02">Cambiar</button>
                                <a type="reset" href="login.php" class="btn btn-lg btn-gradient-05" > Cancelar</a>
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