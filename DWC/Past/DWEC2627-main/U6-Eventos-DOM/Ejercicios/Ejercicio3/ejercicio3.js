let p1 = document.getElementById("parrafo1");
let p2 = document.getElementById("parrafo2");
let p3 = document.getElementById("parrafo3");
let botonReaparecer = document.getElementById("reaparecer");

function ocultarParrafo() {
    this.style.display = "none";
}

function eliminarParrafo() {
    this.parentNode.removeChild(this);
}

function reaparecerParrafos() {
    p1.style.display = "block";
    p2.style.display = "block";
    p3.style.display = "block";
}

p1.addEventListener("click", ocultarParrafo);
p2.addEventListener("click", ocultarParrafo);
p3.addEventListener("click", ocultarParrafo);

p1.addEventListener("contextmenu", eliminarParrafo);
p2.addEventListener("contextmenu", eliminarParrafo);
p3.addEventListener("contextmenu", eliminarParrafo);

botonReaparecer.addEventListener("click", reaparecerParrafos);