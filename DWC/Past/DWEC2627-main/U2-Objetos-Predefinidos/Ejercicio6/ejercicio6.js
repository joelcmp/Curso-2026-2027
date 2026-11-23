let fecha = new Date();

let dias = [
    "domingo",
    "lunes",
    "martes",
    "miércoles",
    "jueves",
    "viernes",
    "sábado"
];

let meses = [
    "enero",
    "febrero",
    "marzo",
    "abril",
    "mayo",
    "junio",
    "julio",
    "agosto",
    "septiembre",
    "octubre",
    "noviembre",
    "diciembre"
];

let diaSemana = dias[fecha.getDay()];
let dia = fecha.getDate();
let mes = meses[fecha.getMonth()];
let any = fecha.getFullYear();

alert("Hoy es " + diaSemana + ", " + dia + " de " + mes + " de " + any);
