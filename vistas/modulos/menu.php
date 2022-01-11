  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="logo">
        <span class="ms-1 font-weight-bold text-white">Inventario Contable</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">

	<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '
		<li class="nav-item">
          <a class="nav-link text-white" href="inicio">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home</i>
            </div>
            <span class="nav-link-text ms-1">Inicio</span>
          </a>
        </li>
		<li class="nav-item">
          <a class="nav-link text-white " href="usuarios">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '
		<li class="nav-item">
          <a class="nav-link text-white " href="categorias">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Cotegorias</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="productos">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Productos</span>
          </a>
        </li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '
			
		<li class="nav-item">
          <a class="nav-link text-white " href="clientes">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Clientes</span>
          </a>
        </li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo ' 
			
		<li class="nav-item">
          <a class="nav-link text-white " href="ventas">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Administrar ventas</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="crear-venta">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Crear venta</span>
          </a>
        </li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '
		<li class="nav-item">
          <a class="nav-link text-white " href="reportes">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Reporte de ventas</span>
          </a>
        </li>';

					}

				

				echo '</ul>

			</li>';

		}

		?>
  </aside>
  