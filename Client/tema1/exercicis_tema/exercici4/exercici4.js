//Sergio Sanchis Climent
var valores = [true, 5, false, "hola", "adios", 2];


if(valores[3] > valores[4]){
	document.write("La palabra mas grande es " + valores[3] + "<br \>");
} else {
	document.write("La palabra mas grande es " + valores[4]+ "<br \>");
}

//parte 2

var test1 = valores[0] + "||" +  valores[2];

var resultado1 = valores[0] || valores[2];


document.write(test1 + " retorna " + resultado1 + "<br \>");


var test2 = valores[0] + "&&" +  valores[2];

var resultado2 = valores[0] && valores[2];

document.write(test2 + " retorna " + resultado2 + "<br \>");


//parte 3

document.write( valores[1] + " + "+ valores[5] + " = " + (parseInt(valores[1]) + parseInt(valores[5])) + "<br />");
document.write( valores[1] + " - "+ valores[5] + " = " + (parseInt(valores[1]) - parseInt(valores[5])) + "<br />");
document.write( valores[1] + " * "+ valores[5] + " = " + valores[1] * valores[5] + "<br />");
document.write( valores[1] + " / "+ valores[5] + " = " + valores[1] / valores[5] + "<br />");


