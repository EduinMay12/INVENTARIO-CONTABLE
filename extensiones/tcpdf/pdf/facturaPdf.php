<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA
$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

//$fecha1 = substr($respuestaVenta["fecha"],0,-8);
$fecha1 = $respuestaVenta["fecha"];
$fecha= date('d-m-Y', strtotime($fecha1));
// $fecha = date_parse_from_format($fecha1);
 $y = $fecha;
// $m = $fecha[1];
// $d = $fecha[2];
// $ordenfecha = $d."-".$m."-".$y;

$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],2);
$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF
require_once('tcpdf_include.php');

 
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->startPageGroup();

$pdf->AddPage('P', 'A5');

//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
	
		<tr>
		
			<td align="center" style="background-color:white; width:370px">

				<img style="width: 200px; height: 50px;"  src="images/logo_example.png">

			</td>

		</tr>

		<tr>
		
			<td align="center" style="background-color:white; font-size: 8px; width:370px"><strong>Calle 20 s/n San Antonio Sahcabchén, Calkiní, Campeche</strong></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:240px; height: 3px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:8px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:180px">

				<strong>Vendedor:</strong> $respuestaVendedor[nombre]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:90px; text-align:right">
			
				<strong>Folio N.:</strong> $valorVenta


			</td>

			<td style="border: 1px solid #666; background-color:white; width:110px; text-align:right">
			
				<strong>Fecha:</strong> $y


			</td>

		</tr>
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:380px"><strong>Cliente:</strong> $respuestaCliente[nombre]</td>

		</tr>
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:250px"><strong>Dirección:</strong> $respuestaCliente[direccion]</td>
			<td style="border: 1px solid #666; background-color:white; width:130px"><strong>Tel. cliente:</strong>$respuestaCliente[telefono]</td>

		</tr>
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:380px"><strong>Referrencia:</strong>$respuestaCliente[referencia]</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:240px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:8px; padding:5px 9px;">

		<tr>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center"><strong>Cantidad</strong></td>
		<td style="border: 1px solid #666; background-color:white; width:110px; text-align:center"><strong>Unidad de medida</strong></td>
		<td style="border: 1px solid #666; background-color:white; width:120px;text-align:center"><strong>Producto</strong></td>
		<td style="border: 1px solid #666; background-color:white; width:70px;text-align:center"><strong>Entregado</strong></td>
		

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

	<table style="font-size:8px; padding:5px 10px;">

		<tr>
			
			<td height="5%" style="border: 1px solid #666; color:#333; background-color:white; width:80px;text-align:center">
				$item[cantidad]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">
				$respuestaProducto[unidad_medida]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:120px; text-align:center">
				$item[descripcion]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">
				
			</td>


		</tr>

	</table>
EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

$bloque5 = <<<EOF
	<br>
	<br>
	<br>	
	<img src="images/firma.png">
		
		

EOF;

$pdf->writeHTML($bloque5,false, false, false, false, '');

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 
$pdf->Output('factura.pdf', 'I');


}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>