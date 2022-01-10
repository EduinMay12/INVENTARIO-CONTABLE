
with(document.add_product){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;

		var miCookie = readCookie( "idioma" );
		alert(miCookie);
		if(ok && selectedMarca.value=="" && nombre.value ==""){
			ok=false;
			momento = (miCookie=="es") ? "Debe escribir la Marca de su producto." : "You must to add a Brand name."			
			swal("ERROR",momento, "error");			
					
			//selectedMarca.focus();
		}
		if(ok &&modelo.value==""){
			ok=false;
			momento = (miCookie=="es") ? "Debe escribir el modelo de su producto." : "You must to add your Product model."			
			swal("ERROR",momento, "error");	

			//modelo.focus();
		}
		if(ok && n_serie.value==""){
			ok=false;
			momento = (miCookie=="es") ? "Debe escribir el Número de serie de su producto." : "You must to add your Product Serial Number."			
			swal("ERROR",momento, "error");	
			
			//n_serie.focus();
		}
		if(ok && tienda.value==""){
			ok=false;	
			momento = (miCookie=="es") ? "Debe escribir el establecimiento de compra." : "You must write the purchase Establishment."	
			swal("ERROR",momento, "error");
			
			//tienda.focus();
		}

		if(ok && precio.value==""){
			ok=false;
			momento = (miCookie=="es") ? "Debe escribir el precio de su producto." : "You must write the purchase price of your product."	
			swal("ERROR",momento, "error");
						
			//precio.focus();
		}

		if(ok && fecha.value==""){
			ok=false;
			momento = (miCookie=="es") ? "Debe escribir la fecha de compra." : "You must enter the purchase date."	
			swal("ERROR",momento, "error");
						
			//fecha.focus();
		}
		
		if(ok && imagen.value==""){
			ok=false;
			momento = (miCookie=="es") ? "Debe añadir su ticket de compra." : "You must add your purchase ticket."	
			swal("ERROR",momento, "error");
						
		}

		if(ok){ 
		loader_form();
		submit(); 
		}
	}
}

//------------------LEEMOS COOKIES--------------------//
function readCookie(name) {
  var nameEQ = name + "="; 
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) {
      return decodeURIComponent( c.substring(nameEQ.length,c.length) );
    }
  }
  return null;
}
