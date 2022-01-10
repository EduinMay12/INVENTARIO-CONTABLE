<?php
    define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'inventario-contable'.DIRECTORY_SEPARATOR); 

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
            $msg = "Tu cuenta ha sido eliminada";
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
            echo "Error al eliminar el registro: " . $conn->error;
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
        echo "0 resultados";
    }
                        
?>

<!DOCTYPE html>
<html lang="es">
    <head>

    <?php require_once("../resources/view/template/header.php"); ?>
    </head>
    <!-- ============================================================== -->
    <!--                            Header                              -->
    <!-- ============================================================== -->
        <?php require_once("../resources/view/template/navbar.php"); ?>
    <!-- ============================================================== -->
    <!--                           Fin Header                           -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!--                             SideBar                            -->
    <!-- ============================================================== -->
        <?php require_once("../resources/view/template/sidebar.php"); ?>
    <!-- ============================================================== -->
    <!--                            Fin SideBar                         -->
    <!-- ============================================================== -->

    <div class="container-fluid">
        <div id="contenedor_load">
            <div class="spinner-border text-secondary m-2" role="status"></div>
            <h4 class="text-center"><i class="fas fa-spinner fa-pulse"></i> Cargando...</h4>
        </div>
        <div id="contenedor_page"></div>
        <div id="contenedor_modal"></div>
    </div>

    <!-- ============================================================== -->
    <!--                             Footer                             -->
    <!-- ============================================================== -->
        <?php require_once("../resources/view/template/footer.php"); ?>
    <!-- ============================================================== -->
    <!--                           Fin Footer                           -->
    <!-- ============================================================== -->
        <script type="text/javascript">
            $(document).ready(function() {

                var bandera_menu=true;

                $('#side-menu li a').click(function(){

                    event.preventDefault();
                    var href = $(this).attr('href'); 
                    var extension=href.split('.').pop();

                    if (href!="#" && extension=='php')
                    {        
                        
                        switch (href) {
                                case 'archivos.php':
                                        var url= 'https://www.'+document.domain+'/app/archivos/';
                                        var win = window.open(url, '_blank');
                                    break;
                                case 'base_datos.php':
                                        var url= 'https://www.'+document.domain+'/app/adminer/';
                                        var win = window.open(url, '_blank');
                                    break;
                                default:
                                        $('#side-menu li').removeClass('menuitem-active');
                                        $(this).addClass("active");
                                        $(this).parent().addClass("menuitem-active");
                                        cargar_paginas_div(href);
                                    break;                                
                        }
                                                            
                    } 
                                        
                });                

            });
        </script>

    </body>
</html>