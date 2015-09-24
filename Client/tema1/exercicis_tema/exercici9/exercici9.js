//Sergio Sanchis Climent

var cadena = prompt("Escribe un texto");

alert(info_cadena(cadena));


function info_cadena (cadena){
	
	var temp;
	var message;
	
	//comprobamos si todo el texto esta em mayusculas
	temp = cadena.toUpperCase();
	
	if(cadena == temp){
		
		message = "Todas las letras de la cadena estan en mayusculas";
		
	} else {
		
		//comprobamos si todo el texto esta em minusculas
		temp = cadena.toLowerCase();
		
		if(cadena == temp){
			
			message = "Todas las letras de la cadena estan en minusculas";
		
		} else {
			//la cadena tiene mayusculas y minusculas
			message = "La cadena tiene tanto letras mayusculas como minusculas";
		}
	}
	
	return message;
	
}
