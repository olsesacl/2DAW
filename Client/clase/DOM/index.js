
function changered(p1){
   // var p1 = document.getElementById(id);
    p1.style.color = "red";
    
}

function changeblack(p1){
   // var p1 = document.getElementById(id);
    p1.style.color = "black";
}

/*function changerandom(){
	var p2 = document.getElementById('random');
	
	//crearemos 3 opciones de color, y usamos random para ver que opcion es elegida
	var x = Math.floor((Math.random() * 3) + 1);
	
	switch(x){
		case 1:
			p2.style.color="blue";
			break;
		case 2:
			p2.style.color="red";
			break;
		case 3:
			p2.style.color="yellow";
			break
	}
}*/
function changerandom(){
	var p2 = document.getElementById('random');
	var color_aleatorio='';
	
	hexadecimal = new Array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F")  
   for (i=0;i<6;i++){ 
      posarray = random(); 
      color_aleatorio += hexadecimal[posarray] 
   } 
   
   p2.style.color = "#"+color_aleatorio;
	
	
}
function random(){
	return Math.floor((Math.random() * 16));
}

function cambiar_image(){
    var images = new Array("image_1.jpg", "image_2.jpg", "image_3.jpg", "image_4.jpg", "image_5.jpg");
    
    var img = images[Math.floor(random2(0,images.length))];
   
    
    var p = document.getElementById("image1");
    p.src = "./img/"+img;
    
}

function random2(min, max) {
    
  return Math.random() * (max - min) + min;
}
