<?php 
    define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'inventario-contable'.DIRECTORY_SEPARATOR); 

    // Include config file
    require_once(_RAIZ.'core/loader.php');  

    session_start();
    
    
    //Chekc if we are already logged in to prevent redirections
    if(isset($_SESSION['id'])){
        header("Location: profile.php");
    }

    // define variables and set to empty values
    $username = $password = "";
    $usernameErr = $passwordErr = "";

    //Define cookie variables
    $cookie_username = "username";
    $cookie_password = "password";

    $count = 0;
    $msg = '';

    //Submitting the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        
        //Validating our username
        if (empty($_POST["username"])) {
            $usernameErr = "Se requiere nombre de usuario";
            $count++;
        } else {
            $username = test_input($_POST["username"]);
        }
        
        //Validating our password
        if (empty($_POST["password"])) {
            $passwordErr = "se requiere contraseña";
            $count++;
        } else {
            $password = test_input($_POST["password"]);
        }
        
        //Check if we are free of errors
        if($count == 0){
            
            //check if this user exists in the database
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sql);
            
            //if data matches
            if($result->num_rows > 0) {
                
                // output data
                $row = $result->fetch_assoc();
                //If the user is verified
                if ($row['is_active'] == 1) {
                    
                    //Check if passwords match
                    if(password_verify($password, $row['password'])) {
                        //Set up cookie files to store username and password
                        if (isset($_POST['checkbox'])){
                            setcookie("username", $username, time() + (86400 * 30), "/");
                            setcookie("password", $password, time() + (86400 * 30), "/");
                        } 
                        //Setting our SESSION variables
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['website'] = $row['website'];
                        $_SESSION['image'] = $row['image'];
                        $_SESSION['created_at'] = $row['created_at'];
                        header ("Location: profile.php");
                        exit();

                    } else {
                        $passwordErr = 'Contraseña incorrecta. Inténtalo de nuevo';
                        $password = "";
                        $count++;
                    }
                } else {
                    $msg = '<span class="text-dark">Debe verificar su cuenta antes.</sapn>';
                    $count++;
                }
            } else {
                $msg = '<span class="text-dark">No hay una cuenta con este RFC.</span>';
                $username = $password = "";
                $count++;
            }
        }
    } // End of IF
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Invantario - Contable</title>
        <meta name="description" content="Cfactura sistema de administración contable :)">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
       <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    </head>
    <body class="bg-white">

        <main class="main-content  mt-0">
            <div class="page-header align-items-start min-vh-100">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container my-auto">
                    <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Entrar</h4>
                            <!--div class="row mt-3">
                                <div class="col-2 text-center ms-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-facebook text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center px-1">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-github text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center me-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-google text-white text-lg"></i>
                                    </a>
                                </div>
                            </div-->
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <?php 
                                    if($msg != ''){
                                        echo '<div class="alert alert-danger-bordered alert-lg square fade show" role="alert">';
                                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                                        echo '<i class="ion ion-information-circled mr-2"></i>';
                                        echo '<strong class="text-danger">Error</strong> '.$msg;
                                        echo '</div>';
                                    } else if (isset($_GET['message'])){
                                        echo '<div class="alert alert-danger-bordered alert-lg square fade show" role="alert">';
                                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                                        echo '<i class="ti ti-face-sad mr-2"></i>';
                                        echo '<strong class="text-center">'.$_GET['message'].'</strong>';
                                        echo '</div>';
                                    }
                                ?>
                            <div class="input-group input-group-outline my-3">
                                <?php 
                                    if(!isset($_COOKIE[$cookie_username])){
                                        echo '<label class="form-label">Email</label>';
                                        echo '<input type="name" class="form-control" value="' . $username . '">'; 
                                        echo '<br>';
                                        echo '<span class="error form-text"> ' . $usernameErr . '</span>';
                                    } else {
                                        echo '<input type="text" name="username" value="' . $_COOKIE[$cookie_username] . '">';
                                        echo '<br>';
                                        echo '<span class="error form-text">' . $usernameErr . '</span>';
                                    }
                                ?>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                            |   <?php 
                                    if(!isset($_COOKIE[$cookie_password])){
                                        echo '<label class="form-label">Password</label>';
                                        echo '<input type="password" class="form-control" name="password" value="' . $password . '">';
                                        echo '<br>';
                                        echo '<span class="badge badge-pill badge-danger text-white">'. $passwordErr . '</span>';
                                    } else {
                                        echo '<input class="form-control item" type="password" name="password" placeholder="Enter your password" value="' . $_COOKIE[$cookie_password] . '">';
                                        echo '<br>';
                                        echo '<span class="badge badge-pill badge-danger text-white">' . $passwordErr . '</span>';
                                        }
                                ?>
                            </div>
                            <div class="form-check form-switch d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label mb-0 ms-2" for="rememberMe">Recordar</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Entar</button>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                Aun no tienes una cuenta?
                                <a href="register.php" class="text-primary text-gradient font-weight-bold">Registrar</a>
                            </p>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <footer class="footer position-absolute bottom-2 py-2 w-100">
                    <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                            © <script>
                            document.write(new Date().getFullYear())
                            </script>,
                            Hecho en <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </footer>
            </div>
        </main>

        <script src="../public/js/base/jquery.min.js"></script>
        <!-- End Vendor Js -->


        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>

    </body>
</html>