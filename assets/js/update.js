(function($) {
  "use strict";

	$(document).ready(function() {

		actualizar_tabla('#tb_clientes');

	});

	Dropzone.autoDiscover = false;
    $("#dZUpload").dropzone({
        url: "controller/update_subir_zip.php",
        addRemoveLinks: false,
        maxFiles: 1,
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            sweet('success','','Archivo update cargado con Exito.');
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });


})(jQuery); // End of use strict


    //GUARDAR JSON DE UPDATE
    $(document).on('submit', '#fr_gr_json', function(event) {   

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
                url: 'controller/update_guardar_json.php',
                data: $( "#fr_gr_json" ).serialize(),
                dataType: "html",
                type: 'POST',
                success: function(response){
                    if (response){
                        recargar_contenido_div('#ct_fr_json','update_cargar_info_json.php')
                        sweet('success','','JSON Actualizado con Exito');
                    }else{
                        sweet('error','','Error al Guardar Información');
                    } 
                },
                error: function (response,status, error){ // Si hay algún error.
                    error_ajax_toast();
                }
            }); 
           
        }

    }); 

function abrir_cliente($url){
	window.open($url, '_blank');
}

