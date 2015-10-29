var futbolista = "Messi";

do{
    var seleccio = prompt("Escriu el nom del millor futbolista del món");
    
    if(futbolista.toUpperCase() != seleccio.toUpperCase()){
      
        alert("No tens ni idea de futbol!!!") ;
        
    }
    
}while( futbolista.toUpperCase() != seleccio.toUpperCase());

document.write("<h1>Eres un bon aficionat al futbol</h1>");
