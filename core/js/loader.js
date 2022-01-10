$(window).load(function() {
	setTimeout(removeLoader, 250);
     
});
function removeLoader(){
	$(".loader").fadeOut(); //makes page more lightweight  
	$(".container").fadeIn("fast"); //makes page more lightweight 
	$(".no_encuentras").fadeIn(); //makes page more lightweight 
}; 
