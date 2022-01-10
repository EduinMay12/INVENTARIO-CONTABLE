(function($) {
	"use strict";

	$(document).ready(function(){

	});
})(jQuery);

function cerrarsesion(){
	Swal.fire({
        title: "Cerrar Sesión",
        text: "¿Desea cerrar la sesión?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#4f59ff",
        cancelButtonColor: "#bc0056",
        cancelButtonText: "No",
        confirmButtonText: "Si"
      }).then(function (result) {
        if (result.value) {
          window.location.href="http://"+document.domain+"/public/logout.php";
        }
    });
};


function actualizar_tablas($tabla){
	$($tabla).dataTable({
		"language": {
        "url": "//"+document.domain+"/Cfactura/language/datatables/espaniol.json"
        },
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
	});
}
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
function error_swal(titulo,mensaje){
	Swal.fire({
		type: 'error',
		title: titulo,
		text: mensaje,
		confirmButtonText:'Aceptar'		
	});
}

function success_swal(titulo,mensaje){
	Swal.fire({
		type: 'success',
		title: titulo,
		text: mensaje,
		confirmButtonText:'Aceptar'
	});
}

function img_swal(url,alt,alto){
	Swal.fire({
        imageUrl:url,
        imageHeight: alto,
        imageAlt: alt,
        confirmButtonText:'Aceptar',
        confirmButtonClass: 'btn btn-confirm mt-2'
    });	
}

class validacion{
	constructor () {
    
  	}
  	text_vacio(cadena){
  		if (cadena=="") {
  			return 1;
  		}else{
  			return 0;
  		}
  	}
  	text_tam(cadena,tam){
  		if (cadena.length!=tam) {
  			return 1;
  		}else{
  			return 0;
  		}
  	}
  	select_0(valor){
  		if (valor==0) {
  			return 1;
  		}else{
  			return 0;
  		}
  	}
  	numero(valor){
  		if (isNaN(valor)) {
		    return 1;
		}else{
			return 0;
		}
  	} 	
}


//MUESTRA UN SWAL DE ACUERDO AL TIPO DE AVISO
function mostrar_aviso($tipo,$titulo,$mensaje){

    var $tipo_aviso='';

    switch($tipo) {
              case 1:$tipo_aviso='info';break;
              case 2:$tipo_aviso='warning';break;
              case 3:$tipo_aviso='error';break;
    }

    Swal.fire({type:$tipo_aviso,title:$titulo,text:$mensaje,confirmButtonText:'Aceptar'});
    
}