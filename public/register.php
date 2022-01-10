<?php
    define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'inventario-contable'.DIRECTORY_SEPARATOR); 

    // Include config file
    require_once(_RAIZ.'core/loader.php');
    require_once(_RAIZ.'vendor/PHPMailer-master/PHPMailerAutoload.php'); 

    // define variables and set to empty values
    $name = $username = $email = $website = $password = $confirm_password = "";
    $nameErr = $usernameErr = $emailErr = $websiteErr = $passwordErr = $confirm_passwordErr = "";

    $count = 0;
    $msg = '';
    
    //Submitting the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = test_input($_POST["name"]);
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $password = test_input($_POST["password"]);
        $confirm_password = test_input($_POST["confirm_password"]);
        
        //Validating our name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $count++;
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Solo se permiten letras y espacios en blanco"; 
                $count++;
            }
        }
        
        //Validating our username
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
            $count++;
        } else {
            $username = test_input($_POST["username"]);
            //check if email exist
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $usernameErr = "El nombre de usuario ya existe en la base de datos";
                $username = "";
                $count++;
            }
        }
        
        //Validating our email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $count++;
        } else {
            $email = test_input($_POST["email"]);
            
            //check if email exist
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $emailErr = "El correo electrónico ya existe en la base de datos";
                $email = "";
                $count++;
            } else {
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Formato de correo inválido";
                    $count++;
                }
            }
        }
        
        //Validating our website
        if (empty($_POST["website"])) {
            $websiteErr = "Website is required";
            $count++;
        } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "URL invalida. Debe proporcionar www. antes de su nombre de dominio"; 
                $count++;
            }
        }
        
        //Validating our password
        if (empty($_POST["password"])) {
            $passwordErr = "Se requiere contraseña";
            $count++;
        } else {
            $password = test_input($_POST["password"]);
        }
        
        if (empty($_POST["confirm_password"])) {
            $confirm_passwordErr = "Por favor, confirme su contraseña";
            $count++;
        } else {
            $confirm_password = test_input($_POST["confirm_password"]);
            //Check if the confirm password match the password
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

            //hashing the password before inserting it into database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //generating a random reset code
            $reset_code = md5(crypt(rand(), 'aa'));
            
            //Inserting data into database
            $sql = "INSERT INTO users (name, email, username, password, website, created_at, reset_code, is_active)
            VALUES ('$name', '$email', '$username', '$hashed_password', '$website', " . time() . ", '$reset_code', 0)";

            if ($conn->query($sql) === TRUE) {
                $msg = '<strong class="text-success">Exito!</strong> verifique su cuenta en su correo electronico.';
                
                $message = '
                <header>
                  <span style="display: block; font-weight: 900; font-size: 30px; margin: 20px 0; color:#007dfd">CFactura Registro de Bienvenida<span>
                </header>
                
                <main style="max-width: 960px; margin: 0 auto">
                  <div style="height: 400px; position: relative; padding: 20px; box-sizing: border-box; display: flex; align-items: flex-end; text-decoration: none; border: 4px solid #b0215e; margin-bottom: 20px; background-image: url("https://ejemplo.cipal.com.mx/public/img/fondo/card-5.png"); background-size: cover;">
                      <div style=" height: 50%; display: flex; flex-direction: column; justify-content: center; align-items: center; background: white; box-sizing: border-box; padding: 40px;">
                        <h2 style="font-size: 24px; color: black; text-align: center; font-weight: 700; color: #181818; text-shadow: 0px 2px 2px #a6f8d5; position: relative; margin: 0 0 20px 0;">Te has registrado correctamente. Haga click en <a href="http://ejemplo.cipal.com.mx/public/process/account_verify.php?code=$reset_code">ACTIVAR</a> para verificar su cuenta:</h2>
                      </div>
                  </div>
                <main>
                  
                <footer style="display: flex; justify-content: center; margin: 40px 0;">
                  <a style="margin-right: 12px; color: #181818; text-decoration: none; position: relative;" href="cfactura.com.mx">CFactura</a>
                  <a style="margin-right: 12px; color: #181818; text-decoration: none; position: relative;" href="cipal.com.mx">CIPAL WEB </a>
                </footer>';
                
                //sending email to the user
                send_mail($email, $message);
                
                $name = $username = $email = $website = $password = $confirm_password = '';
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
                echo 'Algo salió mal';
            }
        }
    }//End of IF
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cfactura - Entrar</title>
        <meta name="description" content="Cfactura sistema de administración contable :)">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <link rel="icon" type="image/png" sizes="92x92" href="../public/img/favicon_.png">
        <link rel="icon" type="image/png" sizes="92x92" href="../public/img/favicon_.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../public/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/base/cfactura.css">
        <link rel="stylesheet" href="../assets/icons/lineawesome/css/line-awesome.css">
        <link rel="stylesheet" href="../assets/icons/ionicons/css/ionicons.css">
        <link rel="stylesheet" href="../assets/icons/themify/css/themify-icons.css">
        <link rel="stylesheet" href="../assets/icons/meteocons/css/meteocons.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <style>
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
            .spinner {
                animation: spinner 1s linear infinite;
                border: solid 5px transparent;
                border-top: solid 5px #ffffff;
                border-radius: 100%;
                width: 60px;
                height: 60px;
                margin: 0 auto;
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
            .elisyam-bg.background-01 {
                background: url("../public/img/fondo/card-2.png") no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body class="bg-white">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="../public/img/logo/logo-blanco-actualizado.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                    <div class="elisyam-bg background-01">
                        <div class="elisyam-overlay overlay-01"></div>
                        <div class="authentication-col-content mx-auto">
                            <h1 class="gradient-text-01">
                              Bienvenido a CFactura
                            </h1>
                            <span class="description">
                            CFactura, se adapta a tus necesidades, podrás generar facturas, nóminas, complementos de pago, recibos de honorarios, recibos de arrendamiento, carta porte, notas de crédito, notas de cargo, factura a público en general, facturas con retención de IVA y mucho más.
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form mx-auto">   
                        <div class="logo-centered">
                            <a href="login.php">
                                <img src="../public/img/logo/logo_final.png" alt="logo">
                            </a>
                        </div>
                        <h3>Registro Cfactura</h3>
                          
                        <?php 
                            if($msg != ''){
                                echo '<div class="alert alert-secondary-bordered alert-lg square fade show" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                                echo '<i class="la la-at mr-2"></i>';
                                echo  $msg;
                                echo '</div>';
                            }
                        ?>
                        <br>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="group material-input">
							    <input type="text" name="name" value="<?php echo $name; ?>" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label for="usuario">Nombre Completo</label>
							    <br>
                                <span class="badge badge-pill badge-danger text-white"><?php echo $nameErr; ?></span>
                            </div>
                            <div class="group material-input">
							    <input type="text" name="username" value="<?php echo $username; ?>" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label for="usename">RFC</label>
							    <br>
                                <span class="badge badge-pill badge-danger text-white"><?php echo $usernameErr; ?></span>
                            </div>
                            <div class="group material-input">
							    <input type="email" name="email" value="<?php echo $email; ?>" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label for="email">Correo Electronico</label>
							    <br>
                                <span class="badge badge-pill badge-danger text-white"><?php echo $emailErr; ?></span>
                            </div>
                            <div class="group material-input">
							    <input type="text" name="website" value="<?php echo $website; ?>" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label for="website">Sitio WEB</label>
							    <br>
                                <span class="badge badge-pill badge-danger text-white"><?php echo $websiteErr; ?></span>
                            </div>
                            <div class="group material-input">
							    <input type="password" name="password" value="<?php echo $password; ?>" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label for="password">Contraseña</label>
							    <br>
                                <span class="badge badge-pill badge-danger text-white"><?php echo $passwordErr; ?></span>
                            </div>
                            <div class="group material-input">
							    <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label for="confirm_password">Contraseña Confirmar Contraseña</label>
							    <br>
                                <span class="badge badge-pill badge-danger text-white"><?php echo $confirm_passwordErr; ?></span>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-lg btn-gradient-02" data-loading-text="Entrando a Cfactura" value="Submit" type="submit">Registrar</button>
                                <a class="btn btn-lg btn-gradient-01" href="login.php">Volver</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Form -->                        
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->    
        <!-- Begin Vendor Js -->
        <script src="../public/js/base/jquery.min.js"></script>
        <script src="../public/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="../public/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
    </body>
</html>