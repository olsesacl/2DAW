//Sergio Sanchis Climent

/*
 * Definir una función que determine si la cadena de texto que se le pasa como parámetro es un
 *palíndromo, es decir, si se lee de la misma forma desde la izquierda y desde la derecha. Ejemplo de
 *palíndromo complejo: "La ruta nos aporto otro paso natural".
 *
 */

var text = prompt("Escribe un texto");

if(check_palindromo(text)){
	alert("El texto introducido es un palindromo");
}else {
	alert("El texto introducido es NO un palindromo");
}

function check_palindromo(text){
    
    text = limpiar_caracteres(text);
    
    

    for(i = 0; i < text.length/2; i++){

        if(text[i] != text[text.length-i-1]){
                return 0;
        }
    }
    return 1;

}

function limpiar_caracteres(text){
            var r=text.toLowerCase();
            r = r.replace((/\s/g),"");
            r = r.replace((/[àáâãäå]/g),"a");
            r = r.replace((/æ/g),"ae");
            r = r.replace((/ç/g),"c");
            r = r.replace((/[èéêë]/g),"e");
            r = r.replace((/[ìíîï]/g),"i");
            r = r.replace((/ñ/g),"n");                
            r = r.replace((/[òóôõö]/g),"o");
            r = r.replace((/œ/g),"oe");
            r = r.replace((/[ùúûü]/g),"u");
            r = r.replace((/[ýÿ]/g),"y");
            r = r.replace((/\W/g),"");
            return r;
        };