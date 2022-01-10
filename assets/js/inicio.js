(function($) {
	"use strict";

	$(document).ready(function(){
		$("#label_alert").hide();		
	});

	$('#bt_login').on('click',function(e){
		e.preventDefault();
		login();
	});

	$('#password').on('keypress', function (e) {
		e.preventDefault();
         if(e.which === 13){
         	login();    
         }
    });

})(jQuery);

function login(){
	$("#label_alert").hide();		
	if (($("#usuario").val() != "") && ($("#contrasenia").val() != ""))
	{ 	var ajax = $.ajax({
			data: {usuario:$("#usuario").val(),contrasenia: $("#contrasenia").val()},
			type:'post',
			url:'app/controller/login.php',
			success: function (response){
				console.log(response);
				if(response=="success"){
					window.location.href="index.php";
				}else{
					$('#label_alert').html(response);
					$('#label_alert').show();
				}		
			},
			error: function (response,status, error){
				$('#label_alert').html("Error General.");$('#alert2').show();
			}
		});	 
	}
	else
	{
		$('#label_alert').html("Alguno de los campos esta vacio.");$('#label_alert').show();
	}
}