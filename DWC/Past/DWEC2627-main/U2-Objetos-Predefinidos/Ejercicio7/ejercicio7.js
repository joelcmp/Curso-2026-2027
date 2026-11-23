let fecha = prompt("¿Qué día naciste? YYYY/MM/DD");

let fechaHoy = new Date();
let fechaNacimiento = new Date(fecha);

let diferencia = fechaHoy - fechaNacimiento;

let dias = diferencia / (1000 * 60 * 60 * 24);

// Eliminamos decimal
dias = Math.floor(dias);

alert("Han transcurrido " + dias + " días, aproximadamente, desde que naciste");