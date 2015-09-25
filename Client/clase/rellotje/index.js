setInterval(reloj,1000);

function reloj(){
	setreloj(getdate());
}

function setreloj(now){
	document.getElementById("reloj").innerHTML = now;	
}

function getdate(){
	
	var fecha = new Date();

	var hora = checkzero(fecha.getHours());
	var min = checkzero(fecha.getMinutes());
	var sec = checkzero(fecha.getSeconds());
	
	var now = hora + ":" + min + ":" + sec;	
	return now;
}

function checkzero(min){
	
	if(min < 10){
		min = "0" + min;
	}
	
	return min;
}
