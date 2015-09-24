
var frase = prompt("Escriu una frase:");

var num = 0;
var espacios = 0;

if(frase.length > 0)
	num =1;
	

for(var i = 0; i < frase.length; i++){
	if(frase.charAt(i) !=" " && frase.charAt(i-1) == " " ){
		num++;
	}
}

alert("Has escrito un total de " + num + " palabras");
