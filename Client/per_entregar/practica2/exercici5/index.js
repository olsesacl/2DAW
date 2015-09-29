var prendes = ["Sabates", "Pantalons", "Cinturo", "Camisa", "Vestit", "Bolso", "Corbata", "Calcetins", "Camiseta" ,"Sudadera"];
var preu = [25, 35, 25, 15, 5, 60, 24, 18, 21, 37];

var message = "Escriu el nom de la prenda que vols saber el preu:\n";

//mostre les prendes per a facilitar el us
for(var i = 0; i < prendes.length; i++){
    message += prendes[i];
    
    if(i < (prendes.length - 1)){
        message += ", ";
    }
}

var seleccio =prompt(message);

mostrar_preu(prendes, preu, seleccio);


function mostrar_preu(prendes2, preu2, seleccio2){
    
    
    for(var i = 0; i < prendes2.length; i++){
        
        if(seleccio2.toUpperCase() != prendes2[i].toUpperCase()){
            continue;
        } else {
            
            break;
        }
        
    }
    
    //ens asegurem que ha ixit per que l'ha trobat, sino avisara
    if(i == prendes2.length){
        
        alert("No s'ha trobat un producte en eixe nom");
        
    } else {
        
        alert("El producte " + prendes2[i] + " te un preu de " + calc_iva(preu2[i]) + " IVA incl.")
        
    }
    
}

function calc_iva(p){
    var iva = 21;
    var temp = p * iva / 100;
    temp += p;
    
    return temp;
}

