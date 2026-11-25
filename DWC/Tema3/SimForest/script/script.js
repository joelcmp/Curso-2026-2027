const panelConfig = document.getElementById("panel_config");
const panelSimulador = document.getElementById("panel_simulador");
const botonIniciar = document.getElementById("btn_iniciar");
const formConfig = document.getElementById("form_config");
const tableroDIV = document.getElementById("tablero");

const btn_avanzar = document.getElementById("btn_avanzar");
const btn_play = document.getElementById("btn_play");
const btn_pausa = document.getElementById("btn_pausa");
const btn_stop = document.getElementById("btn_stop");

const FERTIL = 0;
const ARBOL = 1;
const FUEGO = 2;
const INFERTIL = 3;

let filas, columnas, pNacimiento, pIncendio;
let bosque = [];
let bosque_futuro = [];
let celdasDOM = [];

let timer = null;
let velocidad = 500;

formConfig.addEventListener("submit", (e) => e.preventDefault());

botonIniciar.addEventListener("click", iniciarSimulacion);
btn_avanzar.addEventListener("click", avanzar);
btn_play.addEventListener("click", play);
btn_pausa.addEventListener("click", pausa);
btn_stop.addEventListener("click", reiniciar);

function iniciarSimulacion() {
    if (!formConfig.reportValidity()) return;

    filas = parseInt(document.getElementById("filas").value);
    columnas = parseInt(document.getElementById("columnas").value);
    pNacimiento = parseFloat(document.getElementById("p_nacimiento").value);
    pIncendio = parseFloat(document.getElementById("p_incendio").value);

    bosque = crearMatriz(filas, columnas, FERTIL);
    bosque_futuro = crearMatriz(filas, columnas, FERTIL);

    construirDOM();

    panelConfig.classList.add("oculto");
    panelSimulador.classList.remove("oculto");
}

function crearMatriz(f, c, valorInicial) {
    let matriz = new Array(f);
    for (let i = 0; i < f; i++) {
        matriz[i] = new Array(c);
        for (let j = 0; j < c; j++) {
            matriz[i][j] = valorInicial;
        }
    }
    return matriz;
}

function construirDOM() {
    tableroDIV.replaceChildren();
    celdasDOM = crearMatriz(filas, columnas, null);

    tableroDIV.style.gridTemplateColumns = `repeat(${columnas}, 20px)`;

    const fragmento = document.createDocumentFragment();

    for (let i = 0; i < filas; i++) {
        for (let j = 0; j < columnas; j++) {
            const celda = document.createElement("div");
            celda.className = "celda_fertil";
            fragmento.appendChild(celda);
            celdasDOM[i][j] = celda; 
        }
    }
    tableroDIV.appendChild(fragmento);
}

function avanzar() {
    for (let i = 0; i < filas; i++) {
        for (let j = 0; j < columnas; j++) {
            let estadoActual = bosque[i][j];

            if (estadoActual === FERTIL) {
                if (Math.random() <= pNacimiento) {
                    bosque_futuro[i][j] = ARBOL;
                } else {
                    bosque_futuro[i][j] = FERTIL;
                }
            } else if (estadoActual === ARBOL) {
                let hayFuegoCerca = false;

                if (i > 0 && bosque[i - 1][j] === FUEGO) hayFuegoCerca = true;
                if (i < filas - 1 && bosque[i + 1][j] === FUEGO) hayFuegoCerca = true;
                if (j > 0 && bosque[i][j - 1] === FUEGO) hayFuegoCerca = true;
                if (j < columnas - 1 && bosque[i][j + 1] === FUEGO) hayFuegoCerca = true;

                if (hayFuegoCerca || Math.random() <= pIncendio) {
                    bosque_futuro[i][j] = FUEGO;
                } else {
                    bosque_futuro[i][j] = ARBOL;
                }
            } else if (estadoActual === FUEGO) {
                bosque_futuro[i][j] = INFERTIL;
            } else if (estadoActual === INFERTIL) {
                bosque_futuro[i][j] = FERTIL;
            }
        }
    }

    for (let i = 0; i < filas; i++) {
        for (let j = 0; j < columnas; j++) {
            bosque[i][j] = bosque_futuro[i][j];
        }
    }

    actualizarVista();
}

function actualizarVista() {
    for (let i = 0; i < filas; i++) {
        for (let j = 0; j < columnas; j++) {
            let celda = celdasDOM[i][j];
            let estado = bosque[i][j];

            celda.className = ""; 

            if (estado === FERTIL) celda.classList.add("celda_fertil");
            if (estado === ARBOL) celda.classList.add("celda_nacimiento");
            if (estado === FUEGO) celda.classList.add("celda_fuego");
            if (estado === INFERTIL) celda.classList.add("celda_infertil");
        }
    }
}

function play() {
    if (timer !== null) return;
    timer = setInterval(avanzar, velocidad);
}

function pausa() {
    clearInterval(timer);
    timer = null;
}

function reiniciar() {
    pausa();
    panelSimulador.classList.add("oculto");
    panelConfig.classList.remove("oculto");
    tableroDIV.replaceChildren();
}