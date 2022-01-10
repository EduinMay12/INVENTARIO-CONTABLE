<?php
define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'https://ejemplo.cipal.com.mx'.DIRECTORY_SEPARATOR); 

require_once(_RAIZ.'core/loader.php');

session_start();

?>
                    <style>
                        .ripple:hover {
                            background: rgb(86 84 255 / 91%) radial-gradient(circle, transparent 1%, rgb(62 190 229 / 78%) 1%) center/15000%;
                        }
                        .table thead {
                            border-radius: 4px;
                        }
                        .table thead th {
                            vertical-align: middle;
                            border: 0 none;
                            padding: 20px 12px 20px 12px;
                            color: #ffffff;
                            font-weight: 600;
                            
                        }
                    </style>
						<!-- Begin Page Header-->
						<div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Usuarios Cfactura</h2>
	                                <div>
			                            <ul class="breadcrumb text-dark">
											<li class="breadcrumb-item"><a href="index.php"><i class="la la-home"></i> Principal</a></li>
                                            <li class="breadcrumb-item"><a href=><i class="la la-user-plus text-dark"></i> Usuarios</a></li>
			                                <li class="breadcrumb-item active"><i class="la la-list"></i> Lista de Usuarios</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->


                        <div class="text-right pt-2">            
                            <button type="button" class="btn btn-gradient-04 mr-1 mb-2 ripple" id="bt_nv_usario">
                                <i class="la la-plus"></i> Nuevo Usuario
                            </button>
                        </div>
                        <br>
                        <!-- Tabla de Usuarios -->
                        <div class="widget widget-07 has-shadow">
                            <!-- Begin Widget Header -->
                            <div class="widget-header bordered d-flex align-items-center">
                                <h2><i class="la la-user-plus text-dark"></i> Usuarios</h2>
                                <div class="widget-options">
                                    <div class="btn-group" role="group">
                                        <a href="index.php"> <button type="button" class="btn btn-primary "><i class="la la-mail-reply"></i> Regresar</button></a>
                                    </div>
                                </div>
                            </div>
                            <!--Inicio Contenido-->
                            <div class="table-responsive" id="ct_tb_usuarios">
                                <?php
                                require_once(_RAIZ.'/app/controller/usuario_listar.php');
                                ?>
                            </div>                
                            <!--Fin Contenido-->
                        </div>  

                        <!-- main js -->
                        <script src="/assets/js/usuarios.js?v="></script>