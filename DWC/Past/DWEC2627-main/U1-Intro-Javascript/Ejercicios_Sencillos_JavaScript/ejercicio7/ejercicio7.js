/*
Modifica el programa anterior para que, cuando saquemos el ratón del <div>
vuelva a su estado original, sin color de fondo.
*/

function cambiarColor() {
    document.getElementById("caja").style.backgroundColor = "green";
}

function quitarColor() {
    document.getElementById("caja").style.backgroundColor = "";
}