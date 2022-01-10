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
                <h2 class="page-header-title">Perfil Fiscal</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="la la-home"></i> Principal</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="la la-cog"></i> Configuración</a></li>
                        <li class="breadcrumb-item active"><i class="la la-user"></i> Perfil Fiscal</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (isset($_GET['message'])){
            echo '<div class="alert bg-gradient-01 alert-dissmissible fade show" role="alert">';
            echo  '<strong>'. $_GET['message'] .'</strong>';
            echo '</div>';
        }
    ?>
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-3">
            <!-- Begin Widget -->
            <div class="widget has-shadow">
                <div class="widget-body">
                    <div class="mt-5">
                    <?php 
                        $sql = "SELECT image FROM users WHERE id = '$id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $image = $row['image'];
                            if ($image == ''){
                            echo    '<img src="../images/profil_auto.jpg" alt="..." style="width: 120px;" class="avatar rounded-circle d-block mx-auto">';
                            } else {
                            echo    '<img src="../images/' . $image . '" alt="..." style="width: 120px;" class="avatar rounded-circle d-block mx-auto">';
                        }
                        } else {
                            echo "0 results";
                        }
                    ?>              
                    </div>
                    <h3 class="text-center mt-3 mb-1"><?php echo $name; ?></h3>
                    <p class="text-center"><?php echo $email; ?></p>
                    <div class="em-separator separator-dashed"></div>
                    <h3 class="text-center mt-3 mb-1">RFC</h3>
                    <p class="text-center"><?php echo $username; ?></p>
                    <div class="em-separator separator-dashed"></div>
                    <h3 class="text-center mt-3 mb-1">Fecha de registro</h3>
                    <p class="text-center"><?php echo(date("d-m-Y",$created_at)); ?></p>
                    <div class="em-separator separator-dashed"></div>
                    <h3 class="text-center mt-3 mb-1">Sitio Web</h3>
                    <p class="text-center"><a href="http://<?php echo $website; ?>" target="_blank"><i class="ion ion-earth"></i> <?php echo $website; ?></a></p>
                </div>
            </div>
            <!-- End Widget -->
        </div>
        <div class="col-xl-9">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><i class="la la-user"></i> Perfil Fiscal</h4>
                </div>
                <div class="widget-body">
                                        <ul class="nav nav-tabs nav-fill" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="j-drop-tab-1" data-toggle="tab" href="#j-d-tab-1" role="tab" aria-controls="j-d-tab-1" aria-selected="true">Mi Perfil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="j-drop-tab-2" data-toggle="tab" href="#j-d-tab-2" role="tab" aria-controls="j-d-tab-2" aria-selected="false">Sellos Digitales / FIEL</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="j-drop-tab-2" data-toggle="tab" href="#j-d-tab-2" role="tab" aria-controls="j-d-tab-3" aria-selected="false">Lugar de Expedición</a>
                                            </li>
                                            
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                   <i class="la la-plus"></i> Más
                                                    <i class="ion-android-arrow-dropdown"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" id="j-nav-dropdown1-tab" href="#j-nav-dropdown1" role="tab" data-toggle="tab">Usuarios</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown1-tab" href="#j-nav-dropdown1" role="tab" data-toggle="tab">Tipos de Comprobantes</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown1-tab" href="#j-nav-dropdown1" role="tab" data-toggle="tab">Addendas</a>

                                                    <a class="dropdown-item" id="j-nav-dropdown1-tab" href="#j-nav-dropdown1" role="tab" data-toggle="tab">Usuarios</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown1-tab" href="#j-nav-dropdown1" role="tab" data-toggle="tab">Cuentas de Banco</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown1-tab" href="#j-nav-dropdown1" role="tab" data-toggle="tab">Ajustes</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown2-tab" href="#j-nav-dropdown2" role="tab" data-toggle="tab">Validación de RFC</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown2-tab" href="#j-nav-dropdown2" role="tab" data-toggle="tab">Observaciones</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown2-tab" href="#j-nav-dropdown2" role="tab" data-toggle="tab">Cobro de Facturas</a>
                                                    <a class="dropdown-item" id="j-nav-dropdown2-tab" href="#j-nav-dropdown2" role="tab" data-toggle="tab">Manuales</a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane fade show active" id="j-d-tab-1" role="tabpanel" aria-labelledby="j-drop-tab-1">
                                            <div class="col-10 ml-auto">
                        <div class="section-title mt-3 mb-3">
                            <h4>01. Información Personal</h4>
                        </div>
                    </div>    
                    <?php include 'resources/view/perfil/uploads.php'; ?>
                    <?php include 'resources/view/perfil/edit.php'; ?> 
                    <div class="col-10 ml-auto">
                        <div class="section-title mt-3 mb-3">
                            <h4>02. Seguidad y Contaseña</h4>
                        </div>
                    </div> 
                    <?php include 'resources/view/perfil/seguridad.php'; ?>
                                            </div>
                                            <div class="tab-pane fade" id="j-d-tab-2" role="tabpanel" aria-labelledby="j-drop-tab-2">
                                                Mauris venenatis rutrum augue vulputate fringilla. Aliquam euismod tempor neque. Ut urna tortor, mattis vitae gravida in, consectetur at est. Nulla eu purus et justo porttitor luctus. Cras sed urna vitae quam interdum varius vel sollicitudin lectus. Proin ullamcorper lacinia justo, eget porta odio egestas sed.
                                            </div>
                                            <div class="tab-pane fade" id="j-nav-dropdown1" role="tabpanel" aria-labelledby="j-nav-dropdown1-tab">
                                                Deserunt officia id Lorem nostrud aute id commodo elit eiusmod enim irure amet eiusmod qui reprehenderit nostrud tempor. Fugiat ipsum excepteur in aliqua non et quis aliquip ad irure in labore cillum elit enim. Consequat aliquip incididunt ipsum et minim laborum laborum laborum et cillum labore.
                                            </div>
                                            <div class="tab-pane fade" id="j-nav-dropdown2" role="tabpanel" aria-labelledby="j-nav-dropdown2-tab">
                                                Proident incididunt esse qui ea nisi ullamco aliquip nostrud velit sint duis. Aute culpa aute cillum sit consectetur mollit minim non reprehenderit tempor. Occaecat amet consectetur aute esse ad ullamco ad commodo mollit reprehenderit esse in consequat.
                                            </div>
                                        </div>
                                    </div>
                
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->

