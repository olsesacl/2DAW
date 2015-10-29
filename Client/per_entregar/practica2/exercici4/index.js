var nom = prompt("Escriga el seu nom");

do{
    var seleccio = menu(nom);
    mostrar_estrofa(seleccio);
    
}while(seleccio != '6');

function menu(nom){
    var escrit = nom + " tria l'estrofa del sonet NOS SOBRAN LOS MOTIVOS de Joaquin Sabina:\n";
    escrit += "1) Estrofa 1\n";
    escrit += "2) Estrofa 2\n";
    escrit += "3) Estrofa 3\n";
    escrit += "4) Estrofa 4\n";
    escrit += "5) Tot el sonet\n";
    escrit += "6) Acabar";
    
    var seleccio = prompt(escrit);
    
    return seleccio;
}

function mostrar_estrofa(seleccio){
    var estrofa1 = "Este adiós no maquilla un hasta luego,\neste nunca no esconde un ojala,\nestas cenizas no juegas con fuego,\neste ciego no mira para atrás";
    var estrofa2 = "Este notario firma lo que escrito,\nesta letra no la protestaré,\nahórrate el acuse de recibo,\nestas vísperas son las de después";
    var estrofa3 = "A este ruido tan huérfano de padre,\nno voy a permitirle que taladre\nun corazón podrido de latir.";
    var estrofa4 = "Este pez ya no muere por la boca,\neste loco se va con otra loca,\nestos ojos no lloran más por ti";

    switch (seleccio){
        case '1':
            alert(estrofa1);
            break;
        case '2':
            alert(estrofa2);
            break;
        case '3':
            alert(estrofa3);
            break;
        case '4':
            alert(estrofa4);
            break;
        case '5':
            alert(estrofa1 + "\n" + estrofa2 + "\n" + estrofa3 + "\n" + estrofa4);
            break;
        case '6':
            alert("Fins la proxima!!");
            break;
        default:
            alert("No s'ha triat una opcio valida");

    }
}