with(document.recupera){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && email.value==""){
			ok=false;
			alert("Debe escribir su email");
			email.focus();
		}
		if(ok){ submit(); }
	}
}
