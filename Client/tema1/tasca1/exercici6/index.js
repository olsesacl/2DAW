
var frase = prompt("Escriu una frase:");

if(frase.length < 100){
	alert("no es pot continuar");
} else {
	var num = 0;
	
	for(i in frase){
		if(i=="a"){
			num++;
		}
	}
	
	alert(frase + "\n"+num +" lletres -a-");
	
}
