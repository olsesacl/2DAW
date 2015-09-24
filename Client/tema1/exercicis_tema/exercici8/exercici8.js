//Sergio Sanchis Climent

var numero = prompt("Inserta un numero");

alert(par_impar(numero));


function par_impar(numero){
	
	if(numero%2 == 0){
		return "El numero es par";
	} else {
		return "El numero es impar";
	}
	
}
