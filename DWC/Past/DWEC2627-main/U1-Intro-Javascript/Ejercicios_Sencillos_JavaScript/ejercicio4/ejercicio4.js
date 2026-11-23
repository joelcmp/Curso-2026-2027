/*
Escribe un programa en JavaScript que pregunte al usuario qué color de
fondo prefiere. El usuario responderá ‘R’ para rojo, ‘V‘ para verde o ‘A’ para azul. Una vez
respondido, el fondo del documento se cambiará al color escogido. Nota: el color de
fondo del documento corresponde a la propiedad bgColor del objeto document. Por tanto,
accederemos a ella mediante la sentencia:

document.body.style.backgroundColor = ' colorExpresadoEnHex ';
*/

let color = window.prompt("¿Qué color de fondo prefieres?\n'R' para rojo\n'V' para verde\n'A' para azul");

switch (color.toUpperCase()) {
    case 'R':
        document.body.style.backgroundColor = '#FF0000';
        break;
    case 'V':
        document.body.style.backgroundColor = '#008000';
        break;
    case 'A':
        document.body.style.backgroundColor = '#0000ff';
        break;
    default:
        break;
}