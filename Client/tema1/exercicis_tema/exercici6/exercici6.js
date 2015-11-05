//Sergio Sanchis Climent

var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N','J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

//recogemos valor DNI
var dni = prompt("Inserta tu numero de DNI");

//comprobacion de numero de DNI
if(dni < 0 || dni > 99999999){
	
	alert("El numero de dni ha de estar comprendido entre 0 y 99999999");
	
} else {
	
	//Introduccion letra DNI
	var letra = prompt("Inserta la letra del DNI");
	
	letra = letra.toUpperCase();

	
	//calculo letra
	var pos_letra = dni % 23;
	
	
	var message = "El dni " + dni + " - " + letra;
	
	//comprobacion
	if(letra == letras[pos_letra]){
		message+=" es correcto";
	} else {
		message +=" no es correcto, la letra deberia ser " + letras[pos_letra];
	}
	
	alert(message);
	
}
