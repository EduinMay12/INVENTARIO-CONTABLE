<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR); 

session_start();
    
require_once(_RAIZ.'core/loader.php');

//Check if the user is not logged in
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}

//Define variables and set them to empty values
$name = $username = $email = $website = $created_at = '';

// define id variable and set to session value
$id = $_SESSION['id'];

$msg = '';

//Submitting the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Delete account
    $sql = "DELETE FROM users WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $msg = "You account has been deleted";
        //Unset and delete the user information
        session_unset();
        session_destroy();
        
        //Destroy the username cookie
        if(isset($_COOKIE['username'])){
            setcookie("username", "", time() - (86400 * 30));
        }
        //Destroy the password cookie
        if(isset($_COOKIE['password'])){
            setcookie("password", "", time() - (86400 * 30));
        }
        header("Location: login.php?message=$msg");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}//End of IF

$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];
    $website = $row['website'];
    $created_at = $row['created_at'];
} else {
    echo "0 results";
}

?>
<!-- Begin Page Header--> 
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h2 class="page-header-title">Bienvenido a CFactura</h2>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-home"></i> Principal</a></li>
                    <li class="breadcrumb-item"><a href="#"><i class="la la-newspaper-o"></i> Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>    <!-- End Page Header -->
    
</div>
<div class="row flex-row">
    <div class="col-xl-3 col-md-3 col-sm-6 col-remove">
        <!-- Begin Card -->
        <div class="widget-image has-shadow">
            <div class="contact-card-2">
                <div class="cover-bg">
                    <img src="../public/img/fondo/card-7.png" class="img-fluid" alt="...">
                </div>
                <!-- Begin Widget Body -->
                <div class="widget-body">
                    <div class="quick-actions hover" id="sidebar-menu">
                        <div class="dropdown" id="side-menu">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                               <i class="la la-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="view/perfil/perfil.php" class="dropdown-item remove"> 
                                    <i class="la la-user"></i>Peril
                                </a>
                                <a href="#" class="dropdown-item"> 
                                    <i class="la la-cog"></i>Configuración de Perfil
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="cover-image mx-auto">
                        <?php 
                            $sql = "SELECT image FROM users WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $image = $row['image'];
                                if ($image == ''){
                                echo    '<img src="../images/profil_auto.jpg"  alt="..." class="rounded-circle mx-auto">';
                                } else {
                                echo    '<img src="../images/' . $image . '"  alt="..." class="rounded-circle mx-auto">';
                            }
                            } else {
                                echo "0 results";
                            }
                        ?>
                        
                    </div>
                    <h4 class="name"><a href="#"><?php echo $username; ?></a></h4>
                    <div class="job"><?php echo $name; ?></div>
                    <div class="social-friends mb-3">
                        <div class="item">
                            <div class="stats">
                                <div class="row d-flex justify-content-between">
                                    <div class="col">
                                        <span class="counter">310</span> 
                                        <span class="text">Facturas</span>
                                    </div>
                                    <div class="col">
                                        <span class="counter">203</span> 
                                        <span class="text">Nominas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Widget Body -->
            </div>
        </div>
        <!-- End Card -->
    </div>

</div>