var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];

var fecha = new Date();

document.write("Hoy es " + semana[(fecha.getDay())]);
