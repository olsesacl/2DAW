//Sergio Sanchis Climent

var numero = prompt("De que numero quieres hacer el factorial?");


var sum = 1;
var message =numero + "! = ";

for(var i = numero ; i > 0 ; i--){
	sum*=parseInt(i);
		
	if(i != numero){
		message += "* ";
	}
	
	message += i + " ";
}

message += "= " + sum;

alert(message);
