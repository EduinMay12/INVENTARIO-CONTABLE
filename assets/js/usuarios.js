(function($) {
  "use strict";

	$(document).ready(function() {

		actualizar_tabla('#tb_usuarios');

	});

	//NUEVO USUARIO FORMULARIO MODAL
	$(document).on('click', '#bt_nv_usario', function(event) {

        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();
		cargar_modal_div('../modal/usuario_nuevo.php');	
        	
  	}); 

})(jQuery); // End of use strict

	//AGREGAR USUARIO FORMULARIO BD
    $(document).on('submit', '#fr_usuario', function(event) {	

    	$(this).addClass('was-validated');


    	if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }else{

        	event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();


        	$.ajax({
	            url: './../app/controller/usuario_nuevo.php',
	            data: $( "#fr_usuario" ).serialize(),
	            dataType: "html",
	            type: 'POST',
	            success: function(response){
	            	switch (response) {
						  case '1':
						  		recargar_tabla('#ct_tb_usuarios','/app/controller/usuario_listar.php','#tb_usuarios');
	                 			$('#modal').modal('hide');
	                 			sweet('success','','Usuario Agregado con Exito');
						    break;
						  case '3':
						  		sweet('error','','El usuario ya Existe.');
						    break;
						  default:
						    	sweet('error','','Error al agregar Usuario');
						    break;
					}
	            },
	            error: function (response,status, error){ // Si hay algún error.
	                error_ajax_toast();
	            }
	        }); 
	        
        }

  	}); 

function usuario_cambiar_contrasenia($id){
	cargar_modal_editar_div($id,'usuario_contrasenia.php');
};

//CAMBIAR CONTRASEÑA USUARIO FORMULARIO BD
    $(document).on('submit', '#fr_con_usuario', function(event) {	

    	$(this).addClass('was-validated');


    	if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }else{

        	event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();

        	$.ajax({
	            url: './../app/controller/usuario_cambiar_contrasenia.php',
	            data: $( "#fr_con_usuario" ).serialize(),
	            dataType: "html",
	            type: 'POST',
	            success: function(response){
	            	switch (response) {
						  case '1':
						  		recargar_tabla('#ct_tb_usuarios','../../app/controller/usuario_listar.php','#tb_usuarios');
	                 			$('#modal').modal('hide');
	                 			sweet('success','','Contraseña cambiada con Exito');
						    break;
						  case '3':
						  		sweet('error','','El usuario ya Existe.');
						    break;
						  default:
						    	sweet('error','','Error al cambiar la contraseña');
						    break;
					}
	            },
	            error: function (response,status, error){ // Si hay algún error.
	                error_ajax_toast();
	            }
	        }); 
	        
        }

  	});

function usuario_editar($id){
	cargar_modal_editar_div($id,'usuario_editar.php');
};

//EDITAR USUARIO FORMULARIO BD
    $(document).on('submit', '#fr_ed_usuario', function(event) {	

    	$(this).addClass('was-validated');


    	if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }else{

        	event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();

            console.log($( "#fr_ed_usuario" ).serialize());

        	$.ajax({
	            url: './../app/controller/usuario_editar.php',
	            data: $( "#fr_ed_usuario" ).serialize(),
	            dataType: "html",
	            type: 'POST',
	            success: function(response){
	            	switch (response) {
						  case '1':
						  		recargar_tabla('#ct_tb_usuarios','../../app/controller/usuario_listar.php','#tb_usuarios');
	                 			$('#modal').modal('hide');
	                 			sweet('success','','Usuario Editado con Exito');
						    break;
						  case '3':
						  		sweet('error','','El usuario ya Existe.');
						    break;
						  default:
						    	sweet('error','','Error al editar Usuario');
						    break;
					}
	            },
	            error: function (response,status, error){ // Si hay algún error.
	                error_ajax_toast();
	            }
	        }); 
	        
        }

  	});


function usuario_eliminar($id,$usuario){

	Swal.fire({
                title:'¿Desea Eliminar el usuario '+$usuario+'?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar',
                cancelButtonText: 'No, Cancelar',
                confirmButtonClass: 'btn btn-info mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                   	$.ajax({
			            url: './../app/controller/usuario_eliminar.php',
			            data: {id:$id},
			            dataType: "html",
			            type: 'POST',
			            success: function(response){
			            	if (response){
								recargar_tabla('#ct_tb_usuarios','../../app/controller/usuario_listar.php','#tb_usuarios');
								sweet('success','Usuario Eliminado con Exito','');
			            	}else{
			            		sweet('error','','Error al eliminar');
			            	}			                 
			            },
			            error: function (response,status, error){ // Si hay algún error.
			                error_ajax_toast();
			            }
			        }); 
                }else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {}
            });

};