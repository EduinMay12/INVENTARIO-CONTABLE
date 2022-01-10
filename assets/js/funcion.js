(function($) {
  "use strict";

	$(document).ready(function() {

		cargar_paginas_div('index.php');       

	});

})(jQuery); // End of use strict

//CARGAR MODAL
function cargar_modal_div($modal){
	$.ajax({
		data:{},
		type:'post',
		url:'/Cfactura/resources/modal/'+$modal,
	success: function (response){
		$("#contenedor_modal").html(response);
		$('#modal').modal('show');
	},
	error: function (response,status, error){
		error_ajax_toast();
	}
	});	
}

//CARGAR MODAL EDICION
function cargar_modal_editar_div($id,$modal){
	$.ajax({
		data:{id:$id},
		type:'post',
		url:'/Cfactura/resources/modal/'+$modal,
	success: function (response){
		$("#contenedor_modal").html(response);
		$('#modal').modal('show');
	},
	error: function (response,status, error){
		error_ajax_toast();
	}
	});	
}

//CARGAR PAGINAS EN DIV
function cargar_paginas_div($pagina){

	$( "#contenedor_load" ).show();

    var url='/resources/'+$pagina;
    $('#contenedor_page').empty(); // Limpia el div 'contenido'
    $('#contenedor_page').load(url, function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
              $( "#contenedor_load" ).hide();
            if(statusTxt == "error")
              $('#contenedor_load').html('<div class="text-center"><h3><span style="font-size: 3em; color: tomato;"><i class="ion ion-alert-circled"></i></span><br> Error al Cargar el Contenido...</h3> <br><br><img src="../public/img/logo/logo_final.png"  width="450" height="200" alt="logo"><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <a href="profile.php" class="btn btn-lg btn-gradient-02 text-white"><i class="la la-refresh"></i>Recargar</a></div>');
          }
    ); // carga el contenido dentro del div 'contenido'    

}

//ACTUALIZAR TABLA CON DATATABLES
function actualizar_tabla($tabla){
	$($tabla).dataTable({
		"language": {
       		"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
        },
		"drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
	});
}

//INICIO CONTROL DE SESION Y ACTIVIDAD

var time;
function inicio() { 
  time = setTimeout(function() { 
	    $(document).ready(function(e) {
	    	window.location.href="public/login.php";
		});
	},600000);//fin timeout
}//fin inicio 600000

function reset() {
  clearTimeout(time);//limpia el timeout para resetear el tiempo desde cero 
  time = setTimeout(function() { 
	    $(document).ready(function(e) {
	    	window.location.href="public/login.php";
		});
	},600000);//fin timeout
}//fin reset

//FIN CONTROL DE SESION Y ACTIVIDAD

//Sweet Alerts
function sweet(tipo,titulo,mensaje){
	Swal.fire({
		type: tipo,
		title: titulo,
		text: mensaje,
		confirmButtonText:'Aceptar'	,
		confirmButtonClass:"btn btn-confirm mt-2"	
	});
}


//ERROR TOAST CONSULTA AJAX
function error_ajax_toast(){
	$.toast({  
		heading:'Error',
		text:'Error  AJAX',
        position:'bottom-right',
        loaderBg:'#bf441d',
        icon:'error',
        hideAfter: 3000,
        stack: 1
    });
}

//RECARGAR TABLAS EN PAGINAS
function recargar_tabla($contendor,$ajax,$tabla){
	$.ajax({
		data:{},
		type:'post',
		url:'controller/'+$ajax,
	success: function (response){
		$($contendor).html(response);
		actualizar_tabla($tabla);
	},
	error: function (response,status, error){
		error_ajax_toast();
	}
	});
}

//RECARGAR CONTENIDO EN DIV
function recargar_contenido_div($contendor,$ajax){
	$.ajax({
		data:{},
		type:'post',
		url:'controller/'+$ajax,
	success: function (response){
		$($contendor).html(response);
	},
	error: function (response,status, error){
		error_ajax_toast();
	}
	});
}