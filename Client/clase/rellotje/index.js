
setInterval(reloj,1000);

function reloj(){
	setreloj(getdate());
}

function setreloj(now){
	document.getElementById("reloj").innerHTML = now;
	/*var mireloj = document.getElementById("reloj");
	if(mireloj != null){
		mireloj.innerHTML = now;
	}*/
	
	
}



function getdate(){
	
	var fecha = new Date();

	var hora = fecha.getHours();
	var min = fecha.getMinutes();
	var sec = fecha.getSeconds();
	
	min = checkzero(min);
	
	var now = hora + ":" + min + ":" + sec;	
	return now;
}

function checkzero(min){
	
	if(min < 10){
		min = "0" + min;
	}
	
	return min;
}
