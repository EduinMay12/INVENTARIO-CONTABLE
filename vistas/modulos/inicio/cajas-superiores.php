<?php

$item = null;
$valor = null;
$orden = "id";

$ventas = ControladorVentas::ctrSumaTotalVentas();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

?>

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
	<div class="card">
		<div class="card-header p-3 pt-2">
			<div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">store</i>
			</div>
			<div class="text-end pt-1">
				<p class="text-sm mb-0 text-capitalize">Ventas</p>
                <h4 class="mb-0">$<?php echo number_format($ventas["total"],2); ?></h4>
			</div>
		</div>
	<hr class="dark horizontal my-0">
	<div class="card-footer p-3">
		<a href="ventas"><p class="mb-0"><span class="text-success text-sm font-weight-bolder">+</span> Más info</p></a>
    </div>
	</div>
</div>

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
	<div class="card">
		<div class="card-header p-3 pt-2">
			<div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">receipt_long</i>
			</div>
			<div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Catergorias</p>
                <h4 class="mb-0"><?php echo number_format($totalCategorias); ?></h4>
			</div>
		</div>
            <hr class="dark horizontal my-0">
		<div class="card-footer p-3">
			<a href="categorias"><p class="mb-0"><span class="text-success text-sm font-weight-bolder">+</span> Más info</p></a>
		</div>
	</div>
</div>


<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
	<div class="card">
		<div class="card-header p-3 pt-2">
			<div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">assignment</i>
			</div>
			<div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Clientes</p>
                <h4 class="mb-0"><?php echo number_format($totalClientes); ?></h4>
			</div>
		</div>
		<hr class="dark horizontal my-0">
		<div class="card-footer p-3">
              <a href="clientes"><p class="mb-0"><span class="text-success text-sm font-weight-bolder">+</span> Más info</p></a>
		</div>
	</div>
</div>


<div class="col-xl-3 col-sm-6">
	<div class="card">
		<div class="card-header p-3 pt-2">
			<div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">view_in_ar</i>
			</div>
			<div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Productos</p>
                <h4 class="mb-0"><?php echo number_format($totalProductos); ?></h4>
			</div>
            </div>
			<hr class="dark horizontal my-0">
			<div class="card-footer p-3">
				<a href="productos"><p class="mb-0"><span class="text-success text-sm font-weight-bolder">+ </span>Más info</p></a>
            </div>
		</div>
	</div>
</div>
	  